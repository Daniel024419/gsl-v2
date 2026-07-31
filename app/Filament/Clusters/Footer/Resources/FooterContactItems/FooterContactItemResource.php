<?php

namespace App\Filament\Clusters\Footer\Resources\FooterContactItems;

use App\Filament\Clusters\Footer\FooterCluster;
use App\Filament\Clusters\Footer\Resources\FooterContactItems\Pages\ListFooterContactItems;
use App\Filament\Clusters\Footer\Resources\FooterContactItems\Schemas\FooterContactItemForm;
use App\Filament\Clusters\Footer\Resources\FooterContactItems\Tables\FooterContactItemsTable;
use App\Models\FooterContactItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FooterContactItemResource extends Resource
{
    protected static ?string $model = FooterContactItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhone;

    protected static ?string $navigationLabel = 'Contact Items';

    protected static ?int $navigationSort = 3;

    protected static ?string $cluster = FooterCluster::class;

    protected static ?string $recordTitleAttribute = 'label';

    public static function form(Schema $schema): Schema
    {
        return FooterContactItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FooterContactItemsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFooterContactItems::route('/'),
        ];
    }
}
