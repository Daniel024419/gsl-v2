<?php

namespace App\Filament\Clusters\Overview\Resources\OverviewPillars;

use App\Filament\Clusters\Overview\OverviewCluster;
use App\Filament\Clusters\Overview\Resources\OverviewPillars\Pages\ListOverviewPillars;
use App\Filament\Clusters\Overview\Resources\OverviewPillars\Schemas\OverviewPillarForm;
use App\Filament\Clusters\Overview\Resources\OverviewPillars\Tables\OverviewPillarsTable;
use App\Models\OverviewPillar;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OverviewPillarResource extends Resource
{
    protected static ?string $model = OverviewPillar::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $navigationLabel = 'Vision, Mission & Values';

    protected static ?int $navigationSort = 1;

    protected static ?string $cluster = OverviewCluster::class;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return OverviewPillarForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OverviewPillarsTable::configure($table);
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
            'index' => ListOverviewPillars::route('/'),
        ];
    }
}
