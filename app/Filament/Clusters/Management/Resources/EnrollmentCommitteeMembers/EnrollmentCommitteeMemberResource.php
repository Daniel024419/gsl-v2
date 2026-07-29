<?php

namespace App\Filament\Clusters\Management\Resources\EnrollmentCommitteeMembers;

use App\Filament\Clusters\Management\ManagementCluster;
use App\Filament\Clusters\Management\Resources\EnrollmentCommitteeMembers\Pages\ListEnrollmentCommitteeMembers;
use App\Filament\Clusters\Management\Resources\EnrollmentCommitteeMembers\Schemas\EnrollmentCommitteeMemberForm;
use App\Filament\Clusters\Management\Resources\EnrollmentCommitteeMembers\Tables\EnrollmentCommitteeMembersTable;
use App\Models\EnrollmentCommitteeMember;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EnrollmentCommitteeMemberResource extends Resource
{
    protected static ?string $model = EnrollmentCommitteeMember::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static ?string $navigationLabel = 'Enrollment Committee';

    protected static ?int $navigationSort = 5;

    protected static ?string $cluster = ManagementCluster::class;

    protected static ?string $recordTitleAttribute = 'person.name';

    public static function form(Schema $schema): Schema
    {
        return EnrollmentCommitteeMemberForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EnrollmentCommitteeMembersTable::configure($table);
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
            'index' => ListEnrollmentCommitteeMembers::route('/'),
        ];
    }
}