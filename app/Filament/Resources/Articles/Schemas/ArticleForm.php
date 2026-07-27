<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('slug')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('cat')
                    ->label('Category')
                    ->required(),
                TextInput::make('excerpt')
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
                DatePicker::make('published_at')
                    ->label('Published')
                    ->required(),
                TextInput::make('read')
                    ->label('Read Time')
                    ->placeholder('5 min read')
                    ->required(),
                TextInput::make('author')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->getUploadedFileNameForStorageUsing(
                        fn(TemporaryUploadedFile $file) => rand(1000000, 90000) . '-' . $file->getClientOriginalName()
                    )
                    ->visibility('private')
                    ->disk(config('filesystems.disks.r2.disk'))
                    ->directory(config('filesystems.disks.r2.dir')),
                Textarea::make('icon')
                    ->label('Fallback Icon (SVG path markup)')
                    ->helperText('Shown in place of the image when none is uploaded, e.g. <path d="..."/>')
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
