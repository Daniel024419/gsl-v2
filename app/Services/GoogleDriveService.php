<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Throwable;

use App\Exceptions\GoogleDriveException;
use Google\Client as GoogleClient;
use Google\Service\Drive as GoogleServiceDrive;
use Google\Service\Drive\DriveFile;

class GoogleDriveService
{
    public const FOLDER_MIME_TYPE = 'application/vnd.google-apps.folder';

    protected const FILE_FIELDS = 'id, name, mimeType, size, modifiedTime, webViewLink, iconLink, thumbnailLink, parents';

    protected GoogleClient $client;

    protected GoogleServiceDrive $drive;

    protected ?string $folderId;

    public function __construct()
    {
        $clientId = config('services.google_drive.client_id');
        $clientSecret = config('services.google_drive.client_secret');
        $refreshToken = config('services.google_drive.refresh_token');
        $this->folderId = config('services.google_drive.folder_id');

        if (! $clientId || ! $clientSecret || ! $refreshToken) {
            throw new GoogleDriveException('Google Drive credentials are not configured.');
        }

        $this->client = new GoogleClient();
        $this->client->setClientId($clientId);
        $this->client->setClientSecret($clientSecret);
        $this->client->addScope(GoogleServiceDrive::DRIVE_READONLY);
        $this->client->setAccessType('offline');

        try {
            $token = $this->client->fetchAccessTokenWithRefreshToken($refreshToken);

            if (isset($token['error'])) {
                logger()->error($token['error']);
                throw new GoogleDriveException(
                    'Failed to authenticate with Google Drive: '.($token['error_description'] ?? $token['error'])
                );
            }
        } catch (GoogleDriveException $e) {
            logger()->error(''.$e);
            throw $e;
        } catch (Throwable $e) {
            Log::error('Google Drive authentication failed.', ['error' => $e->getMessage()]);

            throw new GoogleDriveException('Unable to authenticate with Google Drive.', 0, $e);
        }

        $this->drive = new GoogleServiceDrive($this->client);
    }

    /**
     * List files in the configured Google Drive folder.
     */
    public function listFiles(?string $folderId = null): array
    {
        $folderId = $folderId ?? $this->folderId;

        try {
            $parameters = [
                'fields' => 'files('.self::FILE_FIELDS.')',
                'orderBy' => 'folder, modifiedTime desc',
            ];

            if ($folderId) {
                $parameters['q'] = "'{$folderId}' in parents and trashed = false";
            }

            $results = $this->drive->files->listFiles($parameters);

            return array_map(fn (DriveFile $file) => $this->formatFile($file), $results->getFiles());
        } catch (Throwable $e) {
            Log::error('Failed to list Google Drive files.', ['error' => $e->getMessage()]);

            throw new GoogleDriveException('Unable to retrieve files from Google Drive.', 0, $e);
        }
    }

    /**
     * Get metadata for a single file.
     */
    public function getFile(string $fileId): array
    {
        try {
            $file = $this->drive->files->get($fileId, [
                'fields' => self::FILE_FIELDS,
            ]);

            return $this->formatFile($file);
        } catch (Throwable $e) {
            Log::error('Failed to retrieve Google Drive file.', ['file_id' => $fileId, 'error' => $e->getMessage()]);

            throw new GoogleDriveException("Unable to retrieve file [{$fileId}] from Google Drive.", 0, $e);
        }
    }

    /**
     * Download the raw content of a file as a string.
     */
    public function downloadFile(string $fileId): string
    {
        try {
            $response = $this->drive->files->get($fileId, [
                'alt' => 'media',
            ]);

            return $response->getBody()->getContents();
        } catch (Throwable $e) {
            Log::error('Failed to download Google Drive file.', ['file_id' => $fileId, 'error' => $e->getMessage()]);

            throw new GoogleDriveException("Unable to download file [{$fileId}] from Google Drive.", 0, $e);
        }
    }

    /**
     * Search files by name, optionally scoped to a folder (defaults to the configured folder).
     */
    public function searchFiles(string $name, ?string $folderId = null): array
    {
        $folderId = $folderId ?? $this->folderId;

        try {
            $escapedName = str_replace("'", "\\'", $name);
            $query = "name contains '{$escapedName}' and trashed = false";

            if ($folderId) {
                $query .= " and '{$folderId}' in parents";
            }

            $results = $this->drive->files->listFiles([
                'q' => $query,
                'fields' => 'files('.self::FILE_FIELDS.')',
                'orderBy' => 'folder, modifiedTime desc',
            ]);

            return array_map(fn (DriveFile $file) => $this->formatFile($file), $results->getFiles());
        } catch (Throwable $e) {
            Log::error('Failed to search Google Drive files.', ['query' => $name, 'error' => $e->getMessage()]);

            throw new GoogleDriveException('Unable to search files in Google Drive.', 0, $e);
        }
    }

    /**
     * The configured root folder ID that the browser should treat as "home".
     */
    public function getRootFolderId(): ?string
    {
        return $this->folderId;
    }

    protected function formatFile(DriveFile $file): array
    {
        return [
            'id' => $file->getId(),
            'name' => $file->getName(),
            'mimeType' => $file->getMimeType(),
            'size' => $file->getSize(),
            'modifiedTime' => $file->getModifiedTime(),
            'webViewLink' => $file->getWebViewLink(),
            'iconLink' => $file->getIconLink(),
            'thumbnailLink' => $file->getThumbnailLink(),
            'isFolder' => $file->getMimeType() === self::FOLDER_MIME_TYPE,
            'parents' => $file->getParents(),
        ];
    }
}