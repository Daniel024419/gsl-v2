<?php

namespace App\Filament\Clusters\Management\Resources\DepartmentHeads;

use App\Filament\Clusters\Management\ManagementCluster;
use App\Filament\Clusters\Management\Resources\DepartmentHeads\Pages\ListDepartmentHeads;
use App\Filament\Clusters\Management\Resources\DepartmentHeads\Schemas\DepartmentHeadForm;
use App\Filament\Clusters\Management\Resources\DepartmentHeads\Tables\DepartmentHeadsTable;
use App\Models\DepartmentHead;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DepartmentHeadResource extends Resource
{
    protected static ?string $model = DepartmentHead::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static ?string $navigationLabel = 'Administration';

    protected static ?int $navigationSort = 4;

    protected static ?string $cluster = ManagementCluster::class;

    protected static ?string $recordTitleAttribute = 'person.name';

    public static function form(Schema $schema): Schema
    {
        return DepartmentHeadForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DepartmentHeadsTable::configure($table);
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
            'index' => ListDepartmentHeads::route('/'),
        ];
    }
}