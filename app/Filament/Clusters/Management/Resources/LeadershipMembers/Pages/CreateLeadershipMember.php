<?php

namespace App\Filament\Clusters\Management\Resources\LeadershipMembers\Pages;

use App\Filament\Clusters\Management\Resources\LeadershipMembers\LeadershipMemberResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLeadershipMember extends CreateRecord
{
    protected static string $resource = LeadershipMemberResource::class;
}
