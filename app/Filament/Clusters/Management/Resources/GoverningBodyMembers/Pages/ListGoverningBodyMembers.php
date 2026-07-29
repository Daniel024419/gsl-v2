<?php

namespace App\Filament\Clusters\Management\Resources\GoverningBodyMembers\Pages;

use App\Filament\Clusters\Management\Resources\GoverningBodyMembers\GoverningBodyMemberResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGoverningBodyMembers extends ListRecords
{
    protected static string $resource = GoverningBodyMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
