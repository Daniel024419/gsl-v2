<?php

namespace App\Filament\Clusters\History\Resources\NotableAlumni\Pages;

use App\Filament\Clusters\History\Resources\NotableAlumni\NotableAlumnusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNotableAlumni extends ListRecords
{
    protected static string $resource = NotableAlumnusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
