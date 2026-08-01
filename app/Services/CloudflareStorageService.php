<?php

namespace App\Services;

use App\Exceptions\CloudflareStorageException;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\StorageAttributes;
use Symfony\Component\Mime\MimeTypes;
use Throwable;

class CloudflareStorageService
{
    protected FilesystemAdapter $disk;

    protected string $rootDirectory;

    public function __construct()
    {
        $this->disk = Storage::disk('r2');
        $this->rootDirectory = trim((string) config('filesystems.disks.r2.dir', ''), '/');
    }

    /**
     * List folders and files within a directory (defaults to the configured root directory).
     */
    public function listFiles(?string $directory = null): array
    {
        $directory = $this->resolveDirectory($directory);

        try {
            return $this->formatListing(
                $this->disk->getDriver()->listContents($directory, false)
            );
        } catch (Throwable $e) {
            Log::error('Failed to list Cloudflare R2 files.', ['directory' => $directory, 'error' => $e->getMessage()]);

            throw new CloudflareStorageException('Unable to retrieve files from Cloudflare R2.', 0, $e);
        }
    }

    /**
     * Search folders/files by name, recursively, within a directory (defaults to the configured root directory).
     */
    public function searchFiles(string $name, ?string $directory = null): array
    {
        $directory = $this->resolveDirectory($directory);

        try {
            $needle = mb_strtolower($name);

            $entries = $this->formatListing(
                $this->disk->getDriver()->listContents($directory, true)
            );

            return array_values(array_filter(
                $entries,
                fn (array $entry) => str_contains(mb_strtolower($entry['name']), $needle)
            ));
        } catch (Throwable $e) {
            Log::error('Failed to search Cloudflare R2 files.', ['query' => $name, 'error' => $e->getMessage()]);

            throw new CloudflareStorageException('Unable to search files in Cloudflare R2.', 0, $e);
        }
    }

    /**
     * Get metadata for a single file.
     */
    public function getFile(string $path): array
    {
        try {
            return [
                'id' => $path,
                'path' => $path,
                'name' => basename($path),
                'mimeType' => $this->guessMimeType($path),
                'size' => $this->disk->size($path),
                'modifiedTime' => $this->disk->lastModified($path),
                'isFolder' => false,
            ];
        } catch (Throwable $e) {
            Log::error('Failed to retrieve Cloudflare R2 file.', ['path' => $path, 'error' => $e->getMessage()]);

            throw new CloudflareStorageException("Unable to retrieve file [{$path}] from Cloudflare R2.", 0, $e);
        }
    }

    /**
     * Download the raw content of a file as a string.
     */
    public function downloadFile(string $path): string
    {
        try {
            return $this->disk->get($path);
        } catch (Throwable $e) {
            Log::error('Failed to download Cloudflare R2 file.', ['path' => $path, 'error' => $e->getMessage()]);

            throw new CloudflareStorageException("Unable to download file [{$path}] from Cloudflare R2.", 0, $e);
        }
    }

    /**
     * A short-lived signed URL for directly viewing/downloading a file.
     */
    public function temporaryUrl(string $path, int $minutes = 20): ?string
    {
        try {
            return $this->disk->temporaryUrl($path, now()->addMinutes($minutes));
        } catch (Throwable $e) {
            Log::error('Failed to generate a Cloudflare R2 temporary URL.', ['path' => $path, 'error' => $e->getMessage()]);

            return null;
        }
    }

    /**
     * A short-lived signed URL that forces a download with the given filename.
     */
    public function downloadUrl(string $path, ?string $filename = null, int $minutes = 5): ?string
    {
        try {
            return $this->disk->temporaryUrl($path, now()->addMinutes($minutes), [
                'ResponseContentDisposition' => 'attachment; filename="'.addslashes($filename ?? basename($path)).'"',
            ]);
        } catch (Throwable $e) {
            Log::error('Failed to generate a Cloudflare R2 download URL.', ['path' => $path, 'error' => $e->getMessage()]);

            return null;
        }
    }

    /**
     * The configured root directory that the browser should treat as "home".
     */
    public function getRootDirectory(): string
    {
        return $this->rootDirectory;
    }

    protected function resolveDirectory(?string $directory): string
    {
        return $directory ?? $this->rootDirectory;
    }

    /**
     * @param  iterable<StorageAttributes>  $listing
     */
    protected function formatListing(iterable $listing): array
    {
        $folders = [];
        $files = [];

        foreach ($listing as $attributes) {
            $path = $attributes->path();

            if ($attributes->isDir()) {
                $folders[] = [
                    'id' => $path,
                    'path' => $path,
                    'name' => basename($path),
                    'mimeType' => null,
                    'size' => null,
                    'modifiedTime' => null,
                    'thumbnailUrl' => null,
                    'isFolder' => true,
                ];

                continue;
            }

            $mimeType = $attributes->mimeType() ?? $this->guessMimeType($path);

            $files[] = [
                'id' => $path,
                'path' => $path,
                'name' => basename($path),
                'mimeType' => $mimeType,
                'size' => $attributes->fileSize(),
                'modifiedTime' => $attributes->lastModified(),
                'thumbnailUrl' => str_starts_with((string) $mimeType, 'image/') ? $this->temporaryUrl($path) : null,
                'isFolder' => false,
            ];
        }

        usort($folders, fn ($a, $b) => strcasecmp($a['name'], $b['name']));
        usort($files, fn ($a, $b) => $b['modifiedTime'] <=> $a['modifiedTime']);

        return [...$folders, ...$files];
    }

    protected function guessMimeType(string $path): ?string
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));

        if ($extension === '') {
            return null;
        }

        $mimeTypes = MimeTypes::getDefault()->getMimeTypes($extension);

        return $mimeTypes[0] ?? null;
    }
}
