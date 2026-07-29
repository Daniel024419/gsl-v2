<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;

class R2
{
    public static function url(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        $dir = config('filesystems.disks.r2.dir');

        return Storage::disk('r2')->temporaryUrl("{$dir}/{$path}", now()->addMinutes(20));
    }
}
