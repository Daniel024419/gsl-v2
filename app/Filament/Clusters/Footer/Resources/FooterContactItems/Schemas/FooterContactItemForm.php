<?php

namespace App\Filament\Clusters\Footer\Resources\FooterContactItems\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FooterContactItemForm
{
    public const ICONS = [
        'heroicon-o-map-pin' => 'Location',
        'heroicon-o-phone' => 'Phone',
        'heroicon-o-envelope' => 'Email',
        'heroicon-o-clock' => 'Hours',
        'heroicon-o-globe-alt' => 'Website',
        'heroicon-o-printer' => 'Fax',
        'heroicon-o-chat-bubble-left-right' => 'WhatsApp / Chat',
        'heroicon-o-building-office-2' => 'Office / Campus',
    ];

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('icon')
                    ->options(self::ICONS)
                    ->required(),
                TextInput::make('label')
                    ->helperText('The text shown next to the icon, e.g. a phone number or address.')
                    ->required(),
                TextInput::make('link')
                    ->label('Link (optional)')
                    ->helperText('e.g. "tel:+233307003231" or "mailto:enquiries@gslaw.edu.gh". Leave empty for plain text.'),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Items are shown in ascending order.'),
                Toggle::make('is_visible')
                    ->label('Visible on website')
                    ->helperText('Turn off to hide this item from the footer without deleting it.')
                    ->default(true),
            ]);
    }
}
