<?php

namespace App\Filament\Clusters\GslClet\Resources\Directorates\Pages;

use App\Filament\Clusters\GslClet\Resources\Directorates\DirectorateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDirectorates extends ListRecords
{
    protected static string $resource = DirectorateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
