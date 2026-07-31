<?php

namespace App\Filament\Clusters\Footer\Resources\FooterLinks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class FooterLinksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                    ->searchable(),
                TextColumn::make('link_type')
                    ->label('Link Type')
                    ->badge(),
                TextColumn::make('page.title')
                    ->label('Page')
                    ->placeholder('—'),
                TextColumn::make('url')
                    ->label('URL')
                    ->limit(30)
                    ->placeholder('—'),
                ToggleColumn::make('is_visible')
                    ->label('Visible'),
                TextColumn::make('order')
                    ->sortable(),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
