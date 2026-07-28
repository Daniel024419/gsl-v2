<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route as RouteFacade;

#[Fillable(['parent_id', 'label', 'desc', 'link_type', 'route_name', 'page_id', 'url', 'target', 'order', 'is_active'])]
class NavItem extends Model
{
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function parent()
    {
        return $this->belongsTo(NavItem::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(NavItem::class, 'parent_id');
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Build the nested menu as a plain array, matching the shape the
     * header/mobile nav templates expect: label/desc plus either
     * 'route' (a route name) or 'href' (a resolved URL), and 'children'.
     */
    public static function tree(): array
    {
        $all = static::with('page')->where('is_active', true)->orderBy('order')->get();
        $byParent = $all->groupBy('parent_id');

        $build = function (?int $parentId) use (&$build, $byParent) {
            return ($byParent->get($parentId) ?? collect())
                ->map(function (NavItem $item) use ($build) {
                    $node = array_filter([
                        'label' => $item->label,
                        'desc' => $item->desc,
                    ], fn ($value) => $value !== null);

                    if ($item->link_type === 'route' && $item->route_name && RouteFacade::has($item->route_name)) {
                        $node['route'] = $item->route_name;
                    } elseif ($item->link_type === 'page' && $item->page && $item->page->is_published) {
                        $node['href'] = route('page.show', $item->page);
                    } elseif ($item->link_type === 'url' && $item->url) {
                        $node['href'] = $item->url;
                        if ($item->target === '_blank') {
                            $node['target'] = '_blank';
                        }
                    }

                    $children = $build($item->id);
                    if (! empty($children)) {
                        $node['children'] = $children;
                    }

                    return $node;
                })
                ->values()
                ->all();
        };

        return $build(null);
    }
}
