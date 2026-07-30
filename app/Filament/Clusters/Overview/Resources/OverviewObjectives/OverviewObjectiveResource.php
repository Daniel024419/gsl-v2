<?php

namespace App\Filament\Clusters\Overview\Resources\OverviewObjectives;

use App\Filament\Clusters\Overview\OverviewCluster;
use App\Filament\Clusters\Overview\Resources\OverviewObjectives\Pages\ListOverviewObjectives;
use App\Filament\Clusters\Overview\Resources\OverviewObjectives\Schemas\OverviewObjectiveForm;
use App\Filament\Clusters\Overview\Resources\OverviewObjectives\Tables\OverviewObjectivesTable;
use App\Models\OverviewObjective;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OverviewObjectiveResource extends Resource
{
    protected static ?string $model = OverviewObjective::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedListBullet;

    protected static ?string $navigationLabel = 'Objectives';

    protected static ?int $navigationSort = 2;

    protected static ?string $cluster = OverviewCluster::class;

    protected static ?string $recordTitleAttribute = 'text';

    public static function form(Schema $schema): Schema
    {
        return OverviewObjectiveForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OverviewObjectivesTable::configure($table);
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
            'index' => ListOverviewObjectives::route('/'),
        ];
    }
}
