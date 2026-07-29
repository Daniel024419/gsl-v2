<?php

namespace App\Filament\Clusters\Management\Resources\LeadershipMembers\Pages;

use App\Filament\Clusters\Management\Resources\LeadershipMembers\LeadershipMemberResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLeadershipMembers extends ListRecords
{
    protected static string $resource = LeadershipMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
