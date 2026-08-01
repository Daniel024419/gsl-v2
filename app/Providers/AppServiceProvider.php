<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\FooterContactItem;
use App\Models\FooterLink;
use App\Models\NavItem;
use App\Models\Programme;
use App\Services\CloudflareStorageService;
use App\Services\GoogleDriveService;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(GoogleDriveService::class);
        $this->app->singleton(CloudflareStorageService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FileUpload::macro('withDrivePicker', function () {
            /** @var \Filament\Forms\Components\FileUpload $this */
            return $this->hint(fn () => view('filament.components.file-picker-trigger', [
                'statePath' => $this->getStatePath(),
                'mode' => 'fileUpload',
            ]));
        });

        RichEditor::macro('withDrivePicker', function () {
            /** @var \Filament\Forms\Components\RichEditor $this */
            return $this->hint(fn () => view('filament.components.file-picker-trigger', [
                'statePath' => $this->getStatePath(),
                'mode' => 'richEditor',
            ]));
        });

        View::composer('layouts.app', function ($view) {
            $view->with('footerLatestNews', Article::orderByDesc('published_at')->take(5)->get());
            $view->with('footerProgrammes', Programme::visible()->ordered()->take(5)->get());
            $view->with('footerQuickLinks', FooterLink::with('page')->visible()->ordered()->get());
            $view->with('footerContactItems', FooterContactItem::visible()->ordered()->get());
            $view->with('navItems', NavItem::tree());
        });
    }
}
