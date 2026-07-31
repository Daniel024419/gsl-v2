<?php

namespace App\Filament\Clusters\Footer\Resources\FooterContactItems\Pages;

use App\Filament\Clusters\Footer\Resources\FooterContactItems\FooterContactItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFooterContactItems extends ListRecords
{
    protected static string $resource = FooterContactItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
