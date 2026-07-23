<?php

use Illuminate\Support\Facades\Route;

Route::get('/',           fn() => view('welcome'))->name('home');

Route::redirect('/about', '/about/overview')->name('about');
Route::get('/about/gsl-clet',   fn() => view('pages.about.gsl-clet'))->name('about.gsl-clet');
Route::get('/about/overview',   fn() => view('pages.about.overview'))->name('about.overview');
Route::get('/about/history',    fn() => view('pages.about.history'))->name('about.history');
Route::get('/about/management', fn() => view('pages.about.management'))->name('about.management');

Route::get('/programmes',                      fn() => view('pages.programmes'))->name('programmes');
Route::get('/programmes/pre-bar-course',        fn() => view('pages.programmes.pre-bar-course'))->name('programmes.pre-bar-course');
Route::get('/programmes/law-practice-training', fn() => view('pages.programmes.law-practice-training'))->name('programmes.law-practice-training');
Route::get('/programmes/post-call-law-course',  fn() => view('pages.programmes.post-call-law-course'))->name('programmes.post-call-law-course');
Route::get('/examinations',                     fn() => view('pages.examinations'))->name('examinations');
Route::get('/academic-calendar',                fn() => view('pages.academic-calendar'))->name('academic-calendar');

Route::get('/admissions',   fn() => view('pages.admissions'))->name('admissions');
Route::get('/student-life', fn() => view('pages.student-life'))->name('student-life');

Route::get('/events', function () {
    return view('pages.events', ['events' => config('events.events')]);
})->name('events');

Route::get('/events/{slug}', function (string $slug) {
    $events = config('events.events');
    $event = collect($events)->firstWhere('slug', $slug);

    abort_unless($event, 404);

    return view('pages.events-show', ['event' => $event, 'events' => $events]);
})->name('events.show');

Route::get('/news', function () {
    return view('pages.news', ['articles' => config('news.articles')]);
})->name('news');

Route::get('/news/{slug}', function (string $slug) {
    $articles = config('news.articles');
    $article = collect($articles)->firstWhere('slug', $slug);

    abort_unless($article, 404);

    return view('pages.news-show', ['article' => $article, 'articles' => $articles]);
})->name('news.show');

Route::get('/alumni',     fn() => view('pages.alumni'))->name('alumni');
Route::get('/contact',    fn() => view('pages.contact'))->name('contact');