<?php

namespace App\Filament\Clusters\Footer\Resources\Programmes\Schemas;

use App\Support\SiteRoutes;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProgrammeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Select::make('route_name')
                    ->label('Link')
                    ->options(SiteRoutes::OPTIONS)
                    ->searchable()
                    ->helperText('The page this programme links to on the frontend.')
                    ->required(),
                Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull(),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Programmes are shown in ascending order. The footer displays up to the first 5, with a "View All" link to the full Programmes page.'),
                Toggle::make('is_visible')
                    ->label('Visible on website')
                    ->helperText('Turn off to hide this programme from the site without deleting it.')
                    ->default(true),
            ]);
    }
}
