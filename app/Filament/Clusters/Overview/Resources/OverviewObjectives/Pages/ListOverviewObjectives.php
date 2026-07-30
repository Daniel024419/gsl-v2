<?php

namespace App\Filament\Clusters\Overview\Resources\OverviewObjectives\Pages;

use App\Filament\Clusters\Overview\Resources\OverviewObjectives\OverviewObjectiveResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOverviewObjectives extends ListRecords
{
    protected static string $resource = OverviewObjectiveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
