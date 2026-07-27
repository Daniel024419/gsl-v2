<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date')->orderBy('start_time')->paginate(5)->withQueryString();

        return view('pages.events', ['events' => $events]);
    }

    public function show(Event $event)
    {
        $events = Event::orderBy('date')->orderBy('start_time')->get();
        $latestNews = Article::orderByDesc('published_at')->first();

        return view('pages.events-show', ['event' => $event, 'events' => $events, 'latestNews' => $latestNews]);
    }
}
