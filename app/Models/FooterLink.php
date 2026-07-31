<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['label', 'link_type', 'page_id', 'url', 'target', 'order', 'is_visible'])]
class FooterLink extends Model
{
    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
        ];
    }

    protected function href(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->link_type === 'page' && $this->page
                ? route('page.show', $this->page)
                : $this->url,
        );
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
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
