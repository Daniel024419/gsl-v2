<?php

namespace App\Filament\Clusters\Management\Resources\LeadershipMembers;

use App\Filament\Clusters\Management\ManagementCluster;
use App\Filament\Clusters\Management\Resources\LeadershipMembers\Pages\CreateLeadershipMember;
use App\Filament\Clusters\Management\Resources\LeadershipMembers\Pages\EditLeadershipMember;
use App\Filament\Clusters\Management\Resources\LeadershipMembers\Pages\ListLeadershipMembers;
use App\Filament\Clusters\Management\Resources\LeadershipMembers\Schemas\LeadershipMemberForm;
use App\Filament\Clusters\Management\Resources\LeadershipMembers\Tables\LeadershipMembersTable;
use App\Models\LeadershipMember;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LeadershipMemberResource extends Resource
{
    protected static ?string $model = LeadershipMember::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static ?string $navigationLabel = 'Leadership';

    protected static ?int $navigationSort = 1;

    protected static ?string $cluster = ManagementCluster::class;

    protected static ?string $recordTitleAttribute = 'person.name';

    public static function form(Schema $schema): Schema
    {
        return LeadershipMemberForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LeadershipMembersTable::configure($table);
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
            'index' => ListLeadershipMembers::route('/'),
            'create' => CreateLeadershipMember::route('/create'),
            'edit' => EditLeadershipMember::route('/{record}/edit'),
        ];
    }
}
