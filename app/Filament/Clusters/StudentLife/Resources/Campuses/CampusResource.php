<?php

namespace App\Filament\Clusters\StudentLife\Resources\Campuses;

use App\Filament\Clusters\StudentLife\Resources\Campuses\Pages\ListCampuses;
use App\Filament\Clusters\StudentLife\Resources\Campuses\Schemas\CampusForm;
use App\Filament\Clusters\StudentLife\Resources\Campuses\Tables\CampusesTable;
use App\Filament\Clusters\StudentLife\StudentLifeCluster;
use App\Models\Campus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CampusResource extends Resource
{
    protected static ?string $model = Campus::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $navigationLabel = 'Campuses';

    protected static ?int $navigationSort = 2;

    protected static ?string $cluster = StudentLifeCluster::class;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CampusForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CampusesTable::configure($table);
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
            'index' => ListCampuses::route('/'),
        ];
    }
}
