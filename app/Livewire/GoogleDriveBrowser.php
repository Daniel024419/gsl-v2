<?php

namespace App\Livewire;

use App\Exceptions\GoogleDriveException;
use App\Services\GoogleDriveService;
use App\Support\FileDisplay;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Url;
use Livewire\Component;

class GoogleDriveBrowser extends Component
{
    protected const MAX_PREVIEW_BYTES = 8 * 1024 * 1024;

    public string $search = '';

    public array $files = [];

    public ?string $error = null;

    #[Url(as: 'drive_folder')]
    public ?string $currentFolderId = null;

    #[Url(as: 'drive_view')]
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
            Log::error($this->error);
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
        return FileDisplay::icon($mimeType, $isFolder);
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
        return FileDisplay::isPreviewableMimeType($mimeType);
    }

    public static function formatFileSize(?string $bytes): string
    {
        return FileDisplay::formatSize($bytes);
    }

    public function render()
    {
        return view('livewire.google-drive-browser');
    }
}