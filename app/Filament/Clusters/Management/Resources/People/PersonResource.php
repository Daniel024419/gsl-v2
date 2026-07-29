<?php

namespace App\Filament\Clusters\Management\Resources\People;

use App\Filament\Clusters\Management\ManagementCluster;
use App\Filament\Clusters\Management\Resources\People\Pages\ListPeople;
use App\Filament\Clusters\Management\Resources\People\Schemas\PersonForm;
use App\Filament\Clusters\Management\Resources\People\Tables\PeopleTable;
use App\Models\Person;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PersonResource extends Resource
{
    protected static ?string $model = Person::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedIdentification;

    protected static ?string $navigationLabel = 'People';

    protected static ?int $navigationSort = -1;

    protected static ?string $cluster = ManagementCluster::class;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return PersonForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PeopleTable::configure($table);
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
            'index' => ListPeople::route('/'),
        ];
    }
}