<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;

class HomeController extends Controller
{
    public function index()
    {
        $upcomingEvents = Event::where('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('start_time')
            ->take(3)
            ->get();

        $latestArticles = Article::orderByDesc('published_at')->take(3)->get();

        return view('welcome', [
            'upcomingEvents' => $upcomingEvents,
            'latestArticles' => $latestArticles,
        ]);
    }
}
