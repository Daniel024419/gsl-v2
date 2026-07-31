<?php

namespace App\Filament\Clusters\Footer\Resources\FooterLinks\Pages;

use App\Filament\Clusters\Footer\Resources\FooterLinks\FooterLinkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFooterLinks extends ListRecords
{
    protected static string $resource = FooterLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
