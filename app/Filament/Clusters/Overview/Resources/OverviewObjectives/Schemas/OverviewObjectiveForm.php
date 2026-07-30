<?php

namespace App\Filament\Clusters\Overview\Resources\OverviewObjectives\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OverviewObjectiveForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('text')
                    ->label('Objective')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Objectives are shown in ascending order.'),
                Toggle::make('is_visible')
                    ->label('Visible on website')
                    ->helperText('Turn off to hide this objective from the public Overview page without deleting it.')
                    ->default(true),
            ]);
    }
}
