<?php

namespace App\Filament\Clusters\Overview\Resources\OverviewMessages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class OverviewMessageForm
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
                            ->directory(config('filesystems.disks.r2.dir'))
                            ->withDrivePicker(),
                    ])
                    ->required(),
                TextInput::make('slug')
                    ->helperText('Used as the page anchor, e.g. "director" links to #msg-director. Letters, numbers, and dashes only.')
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('heading')
                    ->helperText('e.g. "Welcome from the Director"')
                    ->required(),
                TextInput::make('signature_title')
                    ->label('Signature Title')
                    ->helperText('e.g. "Ag. Director, Ghana School of Law" — shown under the person\'s name at the end of the message.')
                    ->required(),
                Textarea::make('body')
                    ->required()
                    ->columnSpanFull()
                    ->rows(10)
                    ->helperText('Separate paragraphs with a blank line.')
                    ->afterStateHydrated(fn ($component, $state) => $component->state(
                        is_array($state) ? implode("\n\n", $state) : $state
                    ))
                    ->dehydrateStateUsing(fn ($state) => array_values(array_filter(
                        array_map('trim', preg_split('/\r?\n\s*\r?\n/', (string) $state))
                    ))),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Messages are shown in ascending order.'),
                Toggle::make('is_visible')
                    ->label('Visible on website')
                    ->helperText('Turn off to hide this message from the public Overview page without deleting it.')
                    ->default(true),
            ]);
    }
}
