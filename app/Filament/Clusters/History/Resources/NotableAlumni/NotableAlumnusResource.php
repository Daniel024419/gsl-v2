<?php

namespace App\Filament\Clusters\History\Resources\NotableAlumni;

use App\Filament\Clusters\History\HistoryCluster;
use App\Filament\Clusters\History\Resources\NotableAlumni\Pages\ListNotableAlumni;
use App\Filament\Clusters\History\Resources\NotableAlumni\Schemas\NotableAlumnusForm;
use App\Filament\Clusters\History\Resources\NotableAlumni\Tables\NotableAlumniTable;
use App\Models\NotableAlumnus;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NotableAlumnusResource extends Resource
{
    protected static ?string $model = NotableAlumnus::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static ?string $navigationLabel = 'Notable Alumni';

    protected static ?string $cluster = HistoryCluster::class;

    protected static ?string $recordTitleAttribute = 'person.name';

    public static function form(Schema $schema): Schema
    {
        return NotableAlumnusForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NotableAlumniTable::configure($table);
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
            'index' => ListNotableAlumni::route('/'),
        ];
    }
}