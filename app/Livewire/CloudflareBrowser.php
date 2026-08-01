<?php

namespace App\Livewire;

use App\Exceptions\CloudflareStorageException;
use App\Services\CloudflareStorageService;
use App\Support\FileDisplay;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Url;
use Livewire\Component;

class CloudflareBrowser extends Component
{
    protected const MAX_PREVIEW_BYTES = 8 * 1024 * 1024;

    public string $search = '';

    public array $files = [];

    public ?string $error = null;

    #[Url(as: 'r2_path')]
    public ?string $currentDirectory = null;

    #[Url(as: 'r2_view')]
    public string $viewMode = 'grid';

    public array $breadcrumbs = [];

    public ?array $previewFile = null;

    public function mount(): void
    {
        $this->breadcrumbs = [['id' => null, 'name' => 'Cloudflare']];

        if (filled($this->currentDirectory)) {
            $this->breadcrumbs = array_merge(
                $this->breadcrumbs,
                $this->resolveBreadcrumbTrail($this->currentDirectory)
            );
        }

        $this->loadFiles();
    }

    /**
     * Unlike Drive's opaque folder IDs, an R2 path already encodes its full ancestry,
     * so the breadcrumb trail can be rebuilt from the path string alone (no API calls).
     */
    protected function resolveBreadcrumbTrail(string $directory): array
    {
        $root = trim(app(CloudflareStorageService::class)->getRootDirectory(), '/');

        $relative = $directory;
        if ($root !== '' && str_starts_with($directory, $root)) {
            $relative = substr($directory, strlen($root));
        }

        $segments = array_filter(explode('/', trim($relative, '/')));

        $chain = [];
        $accumulated = $root;

        foreach ($segments as $segment) {
            $accumulated = trim($accumulated.'/'.$segment, '/');
            $chain[] = ['id' => $accumulated, 'name' => $segment];
        }

        return $chain;
    }

    public function loadFiles(): void
    {
        try {
            $service = app(CloudflareStorageService::class);

            $this->files = filled($this->search)
                ? $service->searchFiles($this->search, $this->currentDirectory)
                : $service->listFiles($this->currentDirectory);

            $this->error = null;
        } catch (CloudflareStorageException $e) {
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

    public function fileIcon(?string $mimeType, bool $isFolder): string
    {
        return FileDisplay::icon($mimeType, $isFolder);
    }

    public function openFolder(string $path, string $name): void
    {
        $this->currentDirectory = $path;
        $this->breadcrumbs[] = ['id' => $path, 'name' => $name];
        $this->search = '';
        $this->loadFiles();
    }

    public function goToBreadcrumb(int $index): void
    {
        $this->breadcrumbs = array_slice($this->breadcrumbs, 0, $index + 1);
        $this->currentDirectory = $this->breadcrumbs[$index]['id'];
        $this->search = '';
        $this->loadFiles();
    }

    public function download(string $path, string $name)
    {
        $service = app(CloudflareStorageService::class);
        $url = $service->downloadUrl($path, $name);

        if (! $url) {
            Notification::make()
                ->title('Download failed')
                ->body('Unable to generate a download link for this file.')
                ->danger()
                ->send();

            return;
        }

        return redirect()->away($url);
    }

    public function preview(string $path, string $name, ?string $mimeType, ?int $size = null): void
    {
        if (! $this->isPreviewableMimeType($mimeType)) {
            Notification::make()
                ->title('Preview not available')
                ->body('This file type can\'t be previewed in the browser. Please download it instead.')
                ->warning()
                ->send();

            return;
        }

        $service = app(CloudflareStorageService::class);

        if (str_starts_with($mimeType, 'text/')) {
            if ($size !== null && $size > self::MAX_PREVIEW_BYTES) {
                Notification::make()
                    ->title('File too large to preview')
                    ->body('This file is larger than 8 MB. Please download it instead.')
                    ->warning()
                    ->send();

                return;
            }

            try {
                $content = $service->downloadFile($path);
            } catch (CloudflareStorageException $e) {
                Log::error('Cloudflare R2 file preview failed.', ['path' => $path, 'error' => $e->getMessage()]);

                Notification::make()
                    ->title('Preview failed')
                    ->body($e->getMessage())
                    ->danger()
                    ->send();

                return;
            }

            $this->previewFile = [
                'name' => $name,
                'mimeType' => $mimeType,
                'url' => null,
                'text' => $content,
            ];
        } else {
            $url = $service->temporaryUrl($path);

            if (! $url) {
                Notification::make()
                    ->title('Preview failed')
                    ->body('Unable to generate a preview link for this file.')
                    ->danger()
                    ->send();

                return;
            }

            $this->previewFile = [
                'name' => $name,
                'mimeType' => $mimeType,
                'url' => $url,
                'text' => null,
            ];
        }

        $this->dispatch('open-modal', id: 'r2-preview-modal');
    }

    public function closePreview(): void
    {
        $this->previewFile = null;
    }

    public function isPreviewableMimeType(?string $mimeType): bool
    {
        return FileDisplay::isPreviewableMimeType($mimeType);
    }

    public static function formatFileSize(int|string|null $bytes): string
    {
        return FileDisplay::formatSize($bytes);
    }

    public function render()
    {
        return view('livewire.cloudflare-browser');
    }
}
