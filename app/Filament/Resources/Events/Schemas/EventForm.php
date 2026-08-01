<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('desc')
                    ->required(),
                Textarea::make('body')
                    ->required()
                    ->columnSpanFull()
                    ->helperText('Separate paragraphs with a blank line.')
                    ->afterStateHydrated(fn ($component, $state) => $component->state(
                        is_array($state) ? implode("\n\n", $state) : $state
                    ))
                    ->dehydrateStateUsing(fn ($state) => array_values(array_filter(
                        array_map('trim', preg_split('/\r?\n\s*\r?\n/', (string) $state))
                    ))),
                TextInput::make('location')
                    ->required(),
                Toggle::make('is_online')
                    ->label('Online event')
                    ->helperText('Turn on if this event is held online instead of in person.')
                    ->live(),
                TextInput::make('meeting_link')
                    ->label('Registration / Zoom Link')
                    ->url()
                    ->visible(fn (Get $get): bool => (bool) $get('is_online'))
                    ->required(fn (Get $get): bool => (bool) $get('is_online')),
                FileUpload::make('image')
                    ->image()
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file) => rand(1000000, 90000) . '-' . $file->getClientOriginalName()
                    )
                    ->visibility('private')
                    ->disk(config('filesystems.disks.r2.disk'))
                    ->directory(config('filesystems.disks.r2.dir'))
                    ->withDrivePicker()
                    ->required(),
                DatePicker::make('date')
                    ->required(),
                TimePicker::make('start_time')
                    ->required(),
                TimePicker::make('end_time')
                    ->required(),
            ]);
    }
}