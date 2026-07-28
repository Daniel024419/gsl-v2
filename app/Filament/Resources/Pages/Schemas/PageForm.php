<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\{RichEditor, TextInput, Toggle};
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;


class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required()
                    ->helperText('The page will be available at /pages/{slug}.'),
                RichEditor::make('content')
                    ->required()
                    ->fileAttachmentsVisibility('private')
                    ->fileAttachmentsDisk(config('filesystems.disks.r2.disk'))
                    ->fileAttachmentsDirectory(config('filesystems.disks.r2.dir'))
                    ->fileAttachmentsAcceptedFileTypes(['image/png', 'image/jpeg'])
                    ->fileAttachmentsMaxSize(5120)
                    ->resizableImages()
                    ->columnSpanFull()
                    ->floatingToolbars([
                        'paragraph' => [
                            'bold',
                            'italic',
                            'underline',
                            'strike',
                            'subscript',
                            'superscript',
                        ],
                        'heading' => [
                            'h1',
                            'h2',
                            'h3',
                        ],
                        'table' => [
                            'tableAddColumnBefore',
                            'tableAddColumnAfter',
                            'tableDeleteColumn',
                            'tableAddRowBefore',
                            'tableAddRowAfter',
                            'tableDeleteRow',
                            'tableMergeCells',
                            'tableSplitCell',
                            'tableToggleHeaderRow',
                            'tableToggleHeaderCell',
                            'tableDelete',
                        ],
                    ])
                    ->customTextColors(),
                TextInput::make('meta_description')
                    ->label('Meta Description')
                    ->helperText('Used for SEO / social previews.')
                    ->columnSpanFull(),
                Toggle::make('is_published')
                    ->default(true),
            ]);
    }
}