<?php

namespace App\Filament\Clusters\Footer\Resources\FooterLinks\Schemas;

use App\Models\Page;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class FooterLinkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('label')
                    ->required(),
                Select::make('link_type')
                    ->label('Link To')
                    ->options([
                        'page' => 'A Page',
                        'url' => 'External / Custom URL',
                    ])
                    ->default('url')
                    ->live()
                    ->required(),
                Select::make('page_id')
                    ->label('Page')
                    ->options(fn () => Page::query()->pluck('title', 'id'))
                    ->searchable()
                    ->visible(fn (Get $get): bool => $get('link_type') === 'page')
                    ->required(fn (Get $get): bool => $get('link_type') === 'page')
                    ->dehydrated(fn (Get $get): bool => $get('link_type') === 'page'),
                TextInput::make('url')
                    ->label('URL')
                    ->helperText('Can be a full URL (https://...) or an internal path (e.g. /notices).')
                    ->visible(fn (Get $get): bool => $get('link_type') === 'url')
                    ->required(fn (Get $get): bool => $get('link_type') === 'url')
                    ->dehydrated(fn (Get $get): bool => $get('link_type') === 'url'),
                Select::make('target')
                    ->options(['_self' => 'Same Tab', '_blank' => 'New Tab'])
                    ->default('_self'),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Links are shown in ascending order.'),
                Toggle::make('is_visible')
                    ->label('Visible on website')
                    ->helperText('Turn off to hide this link from the footer without deleting it.')
                    ->default(true),
            ]);
    }
}
