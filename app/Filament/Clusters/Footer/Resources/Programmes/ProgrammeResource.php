<?php

namespace App\Filament\Clusters\Footer\Resources\Programmes;

use App\Filament\Clusters\Footer\FooterCluster;
use App\Filament\Clusters\Footer\Resources\Programmes\Pages\ListProgrammes;
use App\Filament\Clusters\Footer\Resources\Programmes\Schemas\ProgrammeForm;
use App\Filament\Clusters\Footer\Resources\Programmes\Tables\ProgrammesTable;
use App\Models\Programme;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProgrammeResource extends Resource
{
    protected static ?string $model = Programme::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static ?string $navigationLabel = 'Programmes';

    protected static ?int $navigationSort = 1;

    protected static ?string $cluster = FooterCluster::class;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ProgrammeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProgrammesTable::configure($table);
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
            'index' => ListProgrammes::route('/'),
        ];
    }
}