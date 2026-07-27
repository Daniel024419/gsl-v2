<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use App\Models\HeroSlide;

class HomeController extends Controller
{
    public function index()
    {
        $heroSlides = HeroSlide::where('is_active', true)->orderBy('order')->get();

        $upcomingEvents = Event::where('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('start_time')
            ->take(3)
            ->get();

        $latestArticles = Article::orderByDesc('published_at')->take(3)->get();

        return view('welcome', [
            'heroSlides' => $heroSlides,
            'upcomingEvents' => $upcomingEvents,
            'latestArticles' => $latestArticles,
        ]);
    }
}
