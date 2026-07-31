<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['icon', 'label', 'link', 'order', 'is_visible'])]
class FooterContactItem extends Model
{
    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
        ];
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
