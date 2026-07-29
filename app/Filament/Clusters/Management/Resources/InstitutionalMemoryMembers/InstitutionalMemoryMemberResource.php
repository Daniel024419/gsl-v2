<?php

namespace App\Filament\Clusters\Management\Resources\InstitutionalMemoryMembers;

use App\Filament\Clusters\Management\ManagementCluster;
use App\Filament\Clusters\Management\Resources\InstitutionalMemoryMembers\Pages\ListInstitutionalMemoryMembers;
use App\Filament\Clusters\Management\Resources\InstitutionalMemoryMembers\Schemas\InstitutionalMemoryMemberForm;
use App\Filament\Clusters\Management\Resources\InstitutionalMemoryMembers\Tables\InstitutionalMemoryMembersTable;
use App\Models\InstitutionalMemoryMember;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InstitutionalMemoryMemberResource extends Resource
{
    protected static ?string $model = InstitutionalMemoryMember::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClock;

    protected static ?string $navigationLabel = 'Institutional Memory';

    protected static ?int $navigationSort = 3;

    protected static ?string $cluster = ManagementCluster::class;

    protected static ?string $recordTitleAttribute = 'person.name';

    public static function form(Schema $schema): Schema
    {
        return InstitutionalMemoryMemberForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InstitutionalMemoryMembersTable::configure($table);
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
            'index' => ListInstitutionalMemoryMembers::route('/'),
        ];
    }
}