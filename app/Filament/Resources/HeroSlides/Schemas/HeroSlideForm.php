<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class HeroSlideForm
{
    public const ROUTE_OPTIONS = [
        'home' => 'Home',
        'programmes' => 'Programmes',
        'admissions' => 'Admissions',
        'student-life' => 'Student Life',
        'events' => 'Events',
        'news' => 'News',
        'about' => 'About',
        'examinations' => 'Examinations',
        'academic-calendar' => 'Academic Calendar',
        'alumni' => 'Alumni',
        'contact' => 'Contact',
        'notices' => 'Notices',
    ];

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('eyebrow')
                    ->required(),
                TextInput::make('heading')
                    ->required()
                    ->helperText('Basic HTML is allowed, e.g. <br> and <span class="text-gold">...</span>.'),
                Textarea::make('text')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file) => rand(1000000, 90000) . '-' . $file->getClientOriginalName()
                    )
                    ->visibility('private')
                    ->disk(config('filesystems.disks.r2.disk'))
                    ->directory(config('filesystems.disks.r2.dir'))
                    ->required(),
                Repeater::make('buttons')
                    ->schema([
                        TextInput::make('label')
                            ->required(),
                        Select::make('route')
                            ->options(self::ROUTE_OPTIONS)
                            ->required(),
                        Select::make('style')
                            ->options(['primary' => 'Primary', 'secondary' => 'Secondary'])
                            ->default('primary')
                            ->required(),
                    ])
                    ->columns(3)
                    ->columnSpanFull()
                    ->defaultItems(1),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Slides are shown in ascending order.'),
                Toggle::make('is_active')
                    ->default(true),
            ]);
    }
}
