<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable(['eyebrow', 'heading', 'text', 'image', 'buttons', 'order', 'is_active'])]
class HeroSlide extends Model
{
    protected function casts(): array
    {
        return [
            'buttons' => 'array',
            'is_active' => 'boolean',
        ];
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::disk('r2')->temporaryUrl($this->image, now()->addMinutes(20)),
        );
    }
}
