<?php

namespace App\Filament\Clusters\Management\Resources\People\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PersonForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->helperText('Used across Leadership, Governing Body, Institutional Memory, Enrollment Committee, and Administration.')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file) => rand(1000000, 90000).'-'.$file->getClientOriginalName()
                    )
                    ->visibility('private')
                    ->disk(config('filesystems.disks.r2.disk'))
                    ->directory(config('filesystems.disks.r2.dir'))
                    ->withDrivePicker(),
            ]);
    }
}
