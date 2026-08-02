<?php

namespace App\Filament\Clusters\StudentLife\Resources\GalleryPhotos\Pages;

use App\Filament\Clusters\StudentLife\Resources\GalleryPhotos\GalleryPhotoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGalleryPhotos extends ListRecords
{
    protected static string $resource = GalleryPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
