<?php

namespace App\Filament\Clusters\Management\Resources\DepartmentHeads\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class DepartmentHeadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('person_id')
                    ->label('Person')
                    ->relationship('person', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required(),
                        FileUpload::make('image')
                            ->image()
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file) => rand(1000000, 90000).'-'.$file->getClientOriginalName()
                            )
                            ->visibility('private')
                            ->disk(config('filesystems.disks.r2.disk'))
                            ->directory(config('filesystems.disks.r2.dir')),
                    ])
                    ->required(),
                Select::make('role_id')
                    ->label('Department')
                    ->relationship('role', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Department')
                            ->unique('management_roles', 'name')
                            ->required(),
                    ])
                    ->required(),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Members are shown in ascending order.'),
                Toggle::make('is_visible')
                    ->label('Visible on website')
                    ->helperText('Turn off to hide this member from the public Management page without deleting them.')
                    ->default(true),
            ]);
    }
}
