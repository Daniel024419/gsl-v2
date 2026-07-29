<?php

namespace App\Filament\Clusters\Management\Resources\LeadershipMembers\Pages;

use App\Filament\Clusters\Management\Resources\LeadershipMembers\LeadershipMemberResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLeadershipMember extends EditRecord
{
    protected static string $resource = LeadershipMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
