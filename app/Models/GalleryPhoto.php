<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable(['image', 'caption', 'size', 'order', 'is_visible'])]
class GalleryPhoto extends Model
{
    public const SIZES = [
        'normal' => 'Normal',
        'wide' => 'Wide (2 columns)',
        'tall' => 'Tall (2 rows)',
        'large' => 'Large (2 columns x 2 rows)',
    ];

    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
        ];
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->image ? Storage::disk('r2')->temporaryUrl($this->image, now()->addMinutes(20)) : null,
        );
    }

    protected function spanClasses(): Attribute
    {
        return Attribute::make(
            get: fn () => match ($this->size) {
                'wide' => 'sm:col-span-2',
                'tall' => 'sm:row-span-2',
                'large' => 'sm:col-span-2 sm:row-span-2',
                default => '',
            },
        );
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
