<?php

namespace App\Filament\Clusters\Management\Resources\GoverningBodyMembers;

use App\Filament\Clusters\Management\ManagementCluster;
use App\Filament\Clusters\Management\Resources\GoverningBodyMembers\Pages\CreateGoverningBodyMember;
use App\Filament\Clusters\Management\Resources\GoverningBodyMembers\Pages\EditGoverningBodyMember;
use App\Filament\Clusters\Management\Resources\GoverningBodyMembers\Pages\ListGoverningBodyMembers;
use App\Filament\Clusters\Management\Resources\GoverningBodyMembers\Schemas\GoverningBodyMemberForm;
use App\Filament\Clusters\Management\Resources\GoverningBodyMembers\Tables\GoverningBodyMembersTable;
use App\Models\GoverningBodyMember;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GoverningBodyMemberResource extends Resource
{
    protected static ?string $model = GoverningBodyMember::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingLibrary;

    protected static ?string $navigationLabel = 'Governing Body';

    protected static ?int $navigationSort = 2;

    protected static ?string $cluster = ManagementCluster::class;

    protected static ?string $recordTitleAttribute = 'person.name';

    public static function form(Schema $schema): Schema
    {
        return GoverningBodyMemberForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GoverningBodyMembersTable::configure($table);
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
            'index' => ListGoverningBodyMembers::route('/'),
            'create' => CreateGoverningBodyMember::route('/create'),
            'edit' => EditGoverningBodyMember::route('/{record}/edit'),
        ];
    }
}
