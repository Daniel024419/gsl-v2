<?php

namespace App\Filament\Clusters\Overview\Resources\OverviewPillars\Pages;

use App\Filament\Clusters\Overview\Resources\OverviewPillars\OverviewPillarResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOverviewPillars extends ListRecords
{
    protected static string $resource = OverviewPillarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
