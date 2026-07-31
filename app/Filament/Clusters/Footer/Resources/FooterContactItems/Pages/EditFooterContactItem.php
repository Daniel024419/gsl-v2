<?php

namespace App\Filament\Clusters\Footer\Resources\FooterContactItems\Pages;

use App\Filament\Clusters\Footer\Resources\FooterContactItems\FooterContactItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFooterContactItem extends EditRecord
{
    protected static string $resource = FooterContactItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
