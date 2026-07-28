<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\NavItem;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $view->with('footerLatestNews', Article::orderByDesc('published_at')->take(5)->get());
            $view->with('navItems', NavItem::tree());
        });
    }
}
