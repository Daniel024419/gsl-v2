<?php

namespace App\Filament\Clusters\Management\Resources\DepartmentHeads\Pages;

use App\Filament\Clusters\Management\Resources\DepartmentHeads\DepartmentHeadResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDepartmentHeads extends ListRecords
{
    protected static string $resource = DepartmentHeadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
