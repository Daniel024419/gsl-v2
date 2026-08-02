<?php

namespace App\Filament\Clusters\StudentLife\Resources\GalleryPhotos\Schemas;

use App\Models\GalleryPhoto;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class GalleryPhotoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->image()
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file) => rand(1000000, 90000).'-'.$file->getClientOriginalName()
                    )
                    ->visibility('private')
                    ->disk(config('filesystems.disks.r2.disk'))
                    ->directory(config('filesystems.disks.r2.dir'))
                    ->withDrivePicker()
                    ->required(),
                TextInput::make('caption')
                    ->helperText('Shown as the caption/alt text under the photo in the gallery.'),
                Select::make('size')
                    ->options(GalleryPhoto::SIZES)
                    ->default('normal')
                    ->helperText('Controls how large this tile appears in the mosaic gallery grid.')
                    ->required(),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Photos are shown in ascending order.'),
                Toggle::make('is_visible')
                    ->label('Visible on website')
                    ->helperText('Turn off to hide this photo from the gallery without deleting it.')
                    ->default(true),
            ]);
    }
}
