<?php

namespace App\Filament\Clusters\Management\Resources\EnrollmentCommitteeMembers\Tables;

use Filament\Actions\{BulkActionGroup, DeleteAction, DeleteBulkAction, EditAction};
use Filament\Tables\Table;
use Filament\Tables\Columns\{ImageColumn, TextColumn, ToggleColumn};

class EnrollmentCommitteeMembersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                    ->label('')
                    ->circular(),
                TextColumn::make('person.name')
                    ->label('Name')
                    ->searchable(),
                TextColumn::make('role.name')
                    ->label('Role / Title')
                    ->searchable(),
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