<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Livewire\Attributes\Url;

class FilesPage extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-folder-open';

    protected static string|\UnitEnum|null $navigationGroup = 'Tools';

    protected static ?string $navigationLabel = 'Files';

    protected static ?string $title = 'Files';

    protected string $view = 'filament.pages.files-page';

    #[Url(as: 'tab')]
    public string $activeTab = 'drive';

    public function setActiveTab(string $tab): void
    {
        $this->activeTab = in_array($tab, ['drive', 'r2'], true) ? $tab : 'drive';
    }
}
