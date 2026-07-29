<?php

namespace App\Filament\Clusters\Management\Resources\InstitutionalMemoryMembers\Pages;

use App\Filament\Clusters\Management\Resources\InstitutionalMemoryMembers\InstitutionalMemoryMemberResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInstitutionalMemoryMembers extends ListRecords
{
    protected static string $resource = InstitutionalMemoryMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
