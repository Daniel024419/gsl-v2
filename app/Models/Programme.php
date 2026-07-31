<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'route_name', 'order', 'is_visible'])]
class Programme extends Model
{
    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
        ];
    }

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->route_name ? route($this->route_name) : null,
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
