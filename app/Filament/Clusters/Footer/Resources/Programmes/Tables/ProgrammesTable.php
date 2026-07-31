<?php

namespace App\Filament\Clusters\Footer\Resources\Programmes\Tables;

use App\Support\SiteRoutes;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ProgrammesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('route_name')
                    ->label('Link')
                    ->formatStateUsing(fn (?string $state): string => $state ? (SiteRoutes::OPTIONS[$state] ?? $state) : '—')
                    ->badge(),
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
