<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\FooterContactItem;
use App\Models\FooterLink;
use App\Models\NavItem;
use App\Models\Programme;
use App\Services\GoogleDriveService;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $view->with('footerLatestNews', Article::orderByDesc('published_at')->take(5)->get());
            $view->with('footerProgrammes', Programme::visible()->ordered()->take(5)->get());
            $view->with('footerQuickLinks', FooterLink::with('page')->visible()->ordered()->get());
            $view->with('footerContactItems', FooterContactItem::visible()->ordered()->get());
            $view->with('navItems', NavItem::tree());
        });
    }
}
