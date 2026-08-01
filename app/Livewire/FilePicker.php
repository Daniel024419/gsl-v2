<?php

namespace App\Livewire;

use App\Exceptions\CloudflareStorageException;
use App\Exceptions\GoogleDriveException;
use App\Services\CloudflareStorageService;
use App\Services\GoogleDriveService;
use App\Support\FileDisplay;
use App\Support\SimplePaginator;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;

class FilePicker extends Component
{
    protected const MAX_COPY_BYTES = 20 * 1024 * 1024;

    protected const PER_PAGE = 24;

    public string $statePath;

    public string $activeTab = 'drive';

    public string $viewMode = 'grid';

    // Google Drive browsing state.
    public string $driveSearch = '';

    public array $driveFiles = [];

    public ?string $driveError = null;

    public ?string $driveFolderId = null;

    public array $driveBreadcrumbs = [];

    public int $drivePage = 1;

    // Cloudflare R2 browsing state.
    public string $r2Search = '';

    public array $r2Files = [];

    public ?string $r2Error = null;

    public ?string $r2Directory = null;

    public array $r2Breadcrumbs = [];

    public int $r2Page = 1;

    public function mount(string $statePath): void
    {
        $this->statePath = $statePath;
        $this->driveBreadcrumbs = [['id' => null, 'name' => 'Drive']];
        $this->r2Breadcrumbs = [['id' => null, 'name' => 'Cloudflare']];

        $this->loadDriveFiles();
        $this->loadR2Files();
    }

    public function setActiveTab(string $tab): void
    {
        $this->activeTab = in_array($tab, ['drive', 'r2'], true) ? $tab : 'drive';
    }

    public function setViewMode(string $mode): void
    {
        $this->viewMode = in_array($mode, ['grid', 'list'], true) ? $mode : 'grid';
    }

    public function fileIcon(?string $mimeType, bool $isFolder): string
    {
        return FileDisplay::icon($mimeType, $isFolder);
    }

    public static function formatFileSize(int|string|null $bytes): string
    {
        return FileDisplay::formatSize($bytes);
    }

    /*
    |--------------------------------------------------------------------------
    | Google Drive
    |--------------------------------------------------------------------------
    */

    public function loadDriveFiles(): void
    {
        try {
            $service = app(GoogleDriveService::class);

            $this->driveFiles = filled($this->driveSearch)
                ? $service->searchFiles($this->driveSearch, $this->driveFolderId)
                : $service->listFiles($this->driveFolderId);

            $this->driveError = null;
        } catch (GoogleDriveException $e) {
            $this->driveFiles = [];
            $this->driveError = $e->getMessage();
            Log::error($this->driveError);
        }

        $this->drivePage = 1;
    }

    public function paginatedDriveFiles(): array
    {
        return SimplePaginator::slice($this->driveFiles, $this->drivePage, self::PER_PAGE);
    }

    public function driveTotalPages(): int
    {
        return SimplePaginator::totalPages($this->driveFiles, self::PER_PAGE);
    }

    public function goToDrivePage(int $page): void
    {
        $this->drivePage = max(1, min($page, $this->driveTotalPages()));
    }

    public function previousDrivePage(): void
    {
        $this->goToDrivePage($this->drivePage - 1);
    }

    public function nextDrivePage(): void
    {
        $this->goToDrivePage($this->drivePage + 1);
    }

    public function updatedDriveSearch(): void
    {
        $this->loadDriveFiles();
    }

    public function openDriveFolder(string $folderId, string $folderName): void
    {
        $this->driveFolderId = $folderId;
        $this->driveBreadcrumbs[] = ['id' => $folderId, 'name' => $folderName];
        $this->driveSearch = '';
        $this->loadDriveFiles();
    }

    public function goToDriveBreadcrumb(int $index): void
    {
        $this->driveBreadcrumbs = array_slice($this->driveBreadcrumbs, 0, $index + 1);
        $this->driveFolderId = $this->driveBreadcrumbs[$index]['id'];
        $this->driveSearch = '';
        $this->loadDriveFiles();
    }

    public function selectDriveFile(string $fileId, string $name, string $mimeType): void
    {
        try {
            $service = app(GoogleDriveService::class);
            $content = $service->downloadFile($fileId);
        } catch (GoogleDriveException $e) {
            Log::error('Google Drive file selection failed.', ['file_id' => $fileId, 'error' => $e->getMessage()]);

            Notification::make()
                ->title('Selection failed')
                ->body($e->getMessage())
                ->danger()
                ->send();

            return;
        }

        if (strlen($content) > self::MAX_COPY_BYTES) {
            Notification::make()
                ->title('File too large')
                ->body('This file is larger than 20 MB. Please download it and upload it manually instead.')
                ->warning()
                ->send();

            return;
        }

        $path = $this->storeCopy($content, $name);

        $this->finishSelection($path);
    }

    /*
    |--------------------------------------------------------------------------
    | Cloudflare R2
    |--------------------------------------------------------------------------
    */

    public function loadR2Files(): void
    {
        try {
            $service = app(CloudflareStorageService::class);

            $this->r2Files = filled($this->r2Search)
                ? $service->searchFiles($this->r2Search, $this->r2Directory)
                : $service->listFiles($this->r2Directory);

            $this->r2Error = null;
        } catch (CloudflareStorageException $e) {
            $this->r2Files = [];
            $this->r2Error = $e->getMessage();
            Log::error($this->r2Error);
        }

        $this->r2Page = 1;
    }

    public function paginatedR2Files(): array
    {
        return SimplePaginator::slice($this->r2Files, $this->r2Page, self::PER_PAGE);
    }

    public function r2TotalPages(): int
    {
        return SimplePaginator::totalPages($this->r2Files, self::PER_PAGE);
    }

    public function goToR2Page(int $page): void
    {
        $this->r2Page = max(1, min($page, $this->r2TotalPages()));
    }

    public function previousR2Page(): void
    {
        $this->goToR2Page($this->r2Page - 1);
    }

    public function nextR2Page(): void
    {
        $this->goToR2Page($this->r2Page + 1);
    }

    public function updatedR2Search(): void
    {
        $this->loadR2Files();
    }

    public function openR2Folder(string $path, string $name): void
    {
        $this->r2Directory = $path;
        $this->r2Breadcrumbs[] = ['id' => $path, 'name' => $name];
        $this->r2Search = '';
        $this->loadR2Files();
    }

    public function goToR2Breadcrumb(int $index): void
    {
        $this->r2Breadcrumbs = array_slice($this->r2Breadcrumbs, 0, $index + 1);
        $this->r2Directory = $this->r2Breadcrumbs[$index]['id'];
        $this->r2Search = '';
        $this->loadR2Files();
    }

    public function selectR2File(string $path): void
    {
        // Already stored on the same disk this app's uploads use — no copy needed.
        $this->finishSelection($path);
    }

    /*
    |--------------------------------------------------------------------------
    | Shared
    |--------------------------------------------------------------------------
    */

    protected function storeCopy(string $content, string $originalName): string
    {
        $directory = trim((string) config('filesystems.disks.r2.dir', ''), '/');
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $filename = Str::random(32).($extension ? '.'.$extension : '');
        $path = $directory !== '' ? "{$directory}/{$filename}" : $filename;

        Storage::disk('r2')->put($path, $content);

        return $path;
    }

    protected function finishSelection(string $path): void
    {
        $this->dispatch('file-picked', statePath: $this->statePath, path: $path);
    }

    public function render()
    {
        return view('livewire.file-picker');
    }
}
