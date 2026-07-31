<?php

namespace App\Filament\Clusters\Footer\Resources\Programmes\Pages;

use App\Filament\Clusters\Footer\Resources\Programmes\ProgrammeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProgrammes extends ListRecords
{
    protected static string $resource = ProgrammeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
