<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required()
                    ->helperText('The page will be available at /pages/{slug}.'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('meta_description')
                    ->label('Meta Description')
                    ->helperText('Used for SEO / social previews.')
                    ->columnSpanFull(),
                Toggle::make('is_published')
                    ->default(true),
            ]);
    }
}
