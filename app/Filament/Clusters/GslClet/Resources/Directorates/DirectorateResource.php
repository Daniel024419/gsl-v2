<?php

namespace App\Filament\Clusters\GslClet\Resources\Directorates;

use App\Filament\Clusters\GslClet\GslCletCluster;
use App\Filament\Clusters\GslClet\Resources\Directorates\Pages\ListDirectorates;
use App\Filament\Clusters\GslClet\Resources\Directorates\Schemas\DirectorateForm;
use App\Filament\Clusters\GslClet\Resources\Directorates\Tables\DirectoratesTable;
use App\Models\Directorate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DirectorateResource extends Resource
{
    protected static ?string $model = Directorate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $navigationLabel = 'Directorates';

    protected static ?string $cluster = GslCletCluster::class;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return DirectorateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DirectoratesTable::configure($table);
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
            'index' => ListDirectorates::route('/'),
        ];
    }
}
