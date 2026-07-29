<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['person_id', 'date_from', 'date_to', 'order', 'is_visible'])]
class InstitutionalMemoryMember extends Model
{
    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
            'date_from' => 'integer',
            'date_to' => 'integer',
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

    protected function tenure(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->date_to ? "{$this->date_from}-{$this->date_to}" : "{$this->date_from}-",
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
