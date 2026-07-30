<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['person_id', 'title', 'order', 'is_visible'])]
class Directorate extends Model
{
    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
        ];
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
