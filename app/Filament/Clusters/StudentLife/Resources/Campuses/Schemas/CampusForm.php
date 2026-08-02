<?php

namespace App\Filament\Clusters\StudentLife\Resources\Campuses\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CampusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->helperText('e.g. "Accra (Main Campus)"')
                    ->required(),
                TextInput::make('location')
                    ->helperText('e.g. "Independence Avenue, Makola, Accra"')
                    ->required(),
                Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Campuses are shown in ascending order.'),
                Toggle::make('is_visible')
                    ->label('Visible on website')
                    ->helperText('Turn off to hide this campus from the Student Life page without deleting it.')
                    ->default(true),
            ]);
    }
}
