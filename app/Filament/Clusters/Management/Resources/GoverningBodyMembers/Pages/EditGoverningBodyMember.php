<?php

namespace App\Filament\Clusters\Management\Resources\GoverningBodyMembers\Pages;

use App\Filament\Clusters\Management\Resources\GoverningBodyMembers\GoverningBodyMemberResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGoverningBodyMember extends EditRecord
{
    protected static string $resource = GoverningBodyMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
