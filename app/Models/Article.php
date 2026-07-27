<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable(['slug', 'cat', 'title', 'excerpt', 'body', 'published_at', 'read', 'author', 'image', 'icon'])]
class Article extends Model
{
    protected function casts(): array
    {
        return [
            'published_at' => 'date',
            'body' => 'array',
        ];
    }

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->published_at->format('F Y'),
        );
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image ? Storage::disk('r2')->temporaryUrl($this->image, now()->addMinutes(20)) : null,
        );
    }
}
