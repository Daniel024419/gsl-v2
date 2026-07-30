<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['person_id', 'slug', 'heading', 'signature_title', 'body', 'order', 'is_visible'])]
class OverviewMessage extends Model
{
    protected function casts(): array
    {
        return [
            'body' => 'array',
            'is_visible' => 'boolean',
        ];
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->person?->name,
        );
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->person?->image_url,
        );
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
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
