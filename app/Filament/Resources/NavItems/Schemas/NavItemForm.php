<?php

namespace App\Filament\Resources\NavItems\Schemas;

use App\Models\NavItem;
use App\Models\Page;
use App\Support\SiteRoutes;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class NavItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label')
                    ->required(),
                TextInput::make('desc')
                    ->label('Description')
                    ->helperText('Shown under the label in the dropdown mega-menu.'),
                Select::make('parent_id')
                    ->label('Parent Item')
                    ->options(fn ($record) => NavItem::query()
                        ->when($record, fn ($query) => $query->whereKeyNot($record->id))
                        ->orderBy('order')
                        ->pluck('label', 'id'))
                    ->searchable()
                    ->helperText('Leave empty for a top-level menu item.'),
                Select::make('link_type')
                    ->label('Link')
                    ->options([
                        'route' => 'Internal Page (built-in)',
                        'page' => 'CMS Page',
                        'url' => 'External / Custom URL',
                    ])
                    ->helperText('Leave empty for a grouping-only heading with no link of its own (e.g. a dropdown label).')
                    ->live(),
                Select::make('route_name')
                    ->label('Route')
                    ->options(SiteRoutes::OPTIONS)
                    ->visible(fn (Get $get): bool => $get('link_type') === 'route')
                    ->required(fn (Get $get): bool => $get('link_type') === 'route')
                    ->dehydrated(fn (Get $get): bool => $get('link_type') === 'route'),
                Select::make('page_id')
                    ->label('Page')
                    ->options(fn () => Page::query()->pluck('title', 'id'))
                    ->searchable()
                    ->visible(fn (Get $get): bool => $get('link_type') === 'page')
                    ->required(fn (Get $get): bool => $get('link_type') === 'page')
                    ->dehydrated(fn (Get $get): bool => $get('link_type') === 'page'),
                TextInput::make('url')
                    ->label('URL')
                    ->url()
                    ->visible(fn (Get $get): bool => $get('link_type') === 'url')
                    ->required(fn (Get $get): bool => $get('link_type') === 'url')
                    ->dehydrated(fn (Get $get): bool => $get('link_type') === 'url'),
                Select::make('target')
                    ->options(['_self' => 'Same Tab', '_blank' => 'New Tab'])
                    ->default('_self')
                    ->visible(fn (Get $get): bool => $get('link_type') === 'url'),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Items are shown in ascending order within their level.'),
                Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}
