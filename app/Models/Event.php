<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

#[Fillable(['slug', 'title', 'desc', 'body', 'location', 'is_online', 'meeting_link', 'image', 'date', 'start_time', 'end_time'])]
class Event extends Model
{
    protected function casts(): array
    {
        return [
            'date' => 'date',
            'body' => 'array',
            'is_online' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected function startTime(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value ? Carbon::parse($value)->format('H:i') : null,
        );
    }

    protected function endTime(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value ? Carbon::parse($value)->format('H:i') : null,
        );
    }

    protected function day(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->date->format('d'),
        );
    }

    protected function month(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->date->format('F'),
        );
    }

    protected function year(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->date->format('Y'),
        );
    }

    protected function time(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->start_time === $this->end_time
                ? $this->start_time
                : "{$this->start_time} – {$this->end_time}",
        );
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::disk('r2')->temporaryUrl($this->image, now()->addMinutes(20)),
        );
    }
}
