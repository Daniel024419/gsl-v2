<?php

namespace App\Filament\Clusters\Overview\Resources\OverviewPillars\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class OverviewPillarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->helperText('e.g. "Vision", "Mission", or "Values".')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Cards are shown in ascending order.'),
                Toggle::make('is_visible')
                    ->label('Visible on website')
                    ->helperText('Turn off to hide this card from the public Overview page without deleting it.')
                    ->default(true),
            ]);
    }
}
