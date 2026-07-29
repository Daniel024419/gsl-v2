<?php

namespace App\Filament\Clusters\Management\Resources\EnrollmentCommitteeMembers\Pages;

use App\Filament\Clusters\Management\Resources\EnrollmentCommitteeMembers\EnrollmentCommitteeMemberResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEnrollmentCommitteeMembers extends ListRecords
{
    protected static string $resource = EnrollmentCommitteeMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
