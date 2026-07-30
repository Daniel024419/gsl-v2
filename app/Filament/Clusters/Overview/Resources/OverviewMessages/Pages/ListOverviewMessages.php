<?php

namespace App\Filament\Clusters\Overview\Resources\OverviewMessages\Pages;

use App\Filament\Clusters\Overview\Resources\OverviewMessages\OverviewMessageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOverviewMessages extends ListRecords
{
    protected static string $resource = OverviewMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
