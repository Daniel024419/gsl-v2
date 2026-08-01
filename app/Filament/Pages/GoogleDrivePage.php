<?php

namespace App\Filament\Pages;

use Illuminate\Support\Facades\Log;
use BackedEnum;

use App\Exceptions\GoogleDriveException;
use App\Services\GoogleDriveService;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Livewire\Attributes\Url;

class GoogleDrivePage extends Page
{
    protected const MAX_PREVIEW_BYTES = 8 * 1024 * 1024;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-folder-open';

    protected static ?string $navigationLabel = 'Drive Files';

    protected static ?string $title = 'Drive Files';

    protected string $view = 'filament.pages.google-drive-page';

    public string $search = '';

    public array $files = [];

    public ?string $error = null;

    #[Url(as: 'folder')]
    public ?string $currentFolderId = null;

    #[Url(as: 'view')]
    public string $viewMode = 'grid';

    public array $breadcrumbs = [];

    public ?array $previewFile = null;

    public function mount(): void
    {
        $this->breadcrumbs = [['id' => null, 'name' => 'Drive']];

        if (filled($this->currentFolderId)) {
            $this->breadcrumbs = array_merge(
                $this->breadcrumbs,
                $this->resolveBreadcrumbTrail($this->currentFolderId)
            );
        }

        $this->loadFiles();
    }

    /**
     * Rebuild the breadcrumb trail for a folder opened directly via URL (e.g. on refresh or a shared link)
     * by walking up its Drive parent chain until the configured root folder is reached.
     */
    protected function resolveBreadcrumbTrail(string $folderId): array
    {
        $service = app(GoogleDriveService::class);
        $rootFolderId = $service->getRootFolderId();

        $chain = [];
        $id = $folderId;
        $depth = 0;

        while (filled($id) && $id !== $rootFolderId && $depth < 20) {
            try {
                $file = $service->getFile($id);
            } catch (GoogleDriveException $e) {
                break;
            }

            array_unshift($chain, ['id' => $file['id'], 'name' => $file['name']]);

            $id = $file['parents'][0] ?? null;
            $depth++;
        }

        return $chain;
    }

    public function loadFiles(): void
    {
        try {
            $service = app(GoogleDriveService::class);

            $this->files = filled($this->search)
                ? $service->searchFiles($this->search, $this->currentFolderId)
                : $service->listFiles($this->currentFolderId);

            $this->error = null;
        } catch (GoogleDriveException $e) {
            $this->files = [];
            $this->error = $e->getMessage();
            logger()->error($this->error);
        }
    }

    public function updatedSearch(): void
    {
        $this->loadFiles();
    }

    public function setViewMode(string $mode): void
    {
        $this->viewMode = in_array($mode, ['grid', 'list'], true) ? $mode : 'grid';
    }

    public function fileIcon(string $mimeType, bool $isFolder): string
    {
        if ($isFolder) {
            return 'heroicon-o-folder';
        }

        return match (true) {
            str_starts_with($mimeType, 'image/') => 'heroicon-o-photo',
            str_starts_with($mimeType, 'video/') => 'heroicon-o-film',
            str_starts_with($mimeType, 'audio/') => 'heroicon-o-musical-note',
            $mimeType === 'application/pdf',
            str_starts_with($mimeType, 'text/') => 'heroicon-o-document-text',
            in_array($mimeType, [
                'application/vnd.google-apps.spreadsheet',
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'text/csv',
            ], true) => 'heroicon-o-table-cells',
            in_array($mimeType, [
                'application/vnd.google-apps.presentation',
                'application/vnd.ms-powerpoint',
                'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            ], true) => 'heroicon-o-presentation-chart-bar',
            in_array($mimeType, [
                'application/zip',
                'application/x-rar-compressed',
                'application/x-7z-compressed',
                'application/x-tar',
                'application/gzip',
            ], true) => 'heroicon-o-archive-box',
            in_array($mimeType, [
                'application/json',
                'application/javascript',
                'application/x-httpd-php',
            ], true) => 'heroicon-o-code-bracket',
            default => 'heroicon-o-document',
        };
    }

    public function openFolder(string $folderId, string $folderName): void
    {
        $this->currentFolderId = $folderId;
        $this->breadcrumbs[] = ['id' => $folderId, 'name' => $folderName];
        $this->search = '';
        $this->loadFiles();
    }

    public function goToBreadcrumb(int $index): void
    {
        $this->breadcrumbs = array_slice($this->breadcrumbs, 0, $index + 1);
        $this->currentFolderId = $this->breadcrumbs[$index]['id'];
        $this->search = '';
        $this->loadFiles();
    }

    public function download(string $fileId, string $fileName)
    {
        try {
            $service = app(GoogleDriveService::class);
            $content = $service->downloadFile($fileId);

            return response()->streamDownload(
                fn () => print ($content),
                $fileName,
            );
        } catch (GoogleDriveException $e) {
            Log::error('Google Drive file download failed.', ['file_id' => $fileId, 'error' => $e->getMessage()]);

            Notification::make()
                ->title('Download failed')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function preview(string $fileId, string $fileName, string $mimeType, ?string $size = null): void
    {
        if (! $this->isPreviewableMimeType($mimeType)) {
            Notification::make()
                ->title('Preview not available')
                ->body('This file type can\'t be previewed in the browser. Please download it instead.')
                ->warning()
                ->send();

            return;
        }

        if ($size !== null && (int) $size > self::MAX_PREVIEW_BYTES) {
            Notification::make()
                ->title('File too large to preview')
                ->body('This file is larger than 8 MB. Please download it instead.')
                ->warning()
                ->send();

            return;
        }

        try {
            $service = app(GoogleDriveService::class);
            $content = $service->downloadFile($fileId);

            $this->previewFile = [
                'name' => $fileName,
                'mimeType' => $mimeType,
                'dataUri' => str_starts_with($mimeType, 'text/') ? null : 'data:'.$mimeType.';base64,'.base64_encode($content),
                'text' => str_starts_with($mimeType, 'text/') ? $content : null,
            ];

            $this->dispatch('open-modal', id: 'drive-preview-modal');
        } catch (GoogleDriveException $e) {
            Log::error('Google Drive file preview failed.', ['file_id' => $fileId, 'error' => $e->getMessage()]);

            Notification::make()
                ->title('Preview failed')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function closePreview(): void
    {
        $this->previewFile = null;
    }

    public function isPreviewableMimeType(string $mimeType): bool
    {
        if ($mimeType === 'application/pdf') {
            return true;
        }

        foreach (['image/', 'text/'] as $prefix) {
            if (str_starts_with($mimeType, $prefix)) {
                return true;
            }
        }

        return false;
    }

    public static function formatFileSize(?string $bytes): string
    {
        if (blank($bytes)) {
            return '—';
        }

        $bytes = (float) $bytes;
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        for ($i = 0; $bytes >= 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 1).' '.$units[$i];
    }
}