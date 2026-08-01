<?php

namespace App\Filament\Clusters\GslClet\Resources\Directorates\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class DirectorateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Directorate Name')
                    ->helperText('e.g. "Curriculum Delivery & Testing"')
                    ->required(),
                Select::make('person_id')
                    ->label('Head of Directorate')
                    ->relationship('person', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required(),
                        FileUpload::make('image')
                            ->image()
                            ->helperText('Leave empty to show the person\'s initials instead of a photo.')
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file) => rand(1000000, 90000).'-'.$file->getClientOriginalName()
                            )
                            ->visibility('private')
                            ->disk(config('filesystems.disks.r2.disk'))
                            ->directory(config('filesystems.disks.r2.dir'))
                            ->withDrivePicker(),
                    ])
                    ->required(),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Directorates are shown in ascending order.'),
                Toggle::make('is_visible')
                    ->label('Visible on website')
                    ->helperText('Turn off to hide this directorate from the public GSL & CLET page without deleting it.')
                    ->default(true),
            ]);
    }
}
