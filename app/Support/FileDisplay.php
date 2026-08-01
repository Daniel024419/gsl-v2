<?php

namespace App\Support;

class FileDisplay
{
    public static function icon(?string $mimeType, bool $isFolder): string
    {
        if ($isFolder) {
            return 'heroicon-o-folder';
        }

        $mimeType ??= '';

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

    public static function isPreviewableMimeType(?string $mimeType): bool
    {
        if (blank($mimeType)) {
            return false;
        }

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

    public static function formatSize(int|string|null $bytes): string
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
