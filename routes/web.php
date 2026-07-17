<?php

use Illuminate\Support\Facades\Route;

Route::get('/',           fn() => view('welcome'))->name('home');

Route::redirect('/about', '/about/overview')->name('about');
Route::get('/about/gsl-clet',   fn() => view('pages.about.gsl-clet'))->name('about.gsl-clet');
Route::get('/about/overview',   fn() => view('pages.about.overview'))->name('about.overview');
Route::get('/about/history',    fn() => view('pages.about.history'))->name('about.history');
Route::get('/about/management', fn() => view('pages.about.management'))->name('about.management');

Route::get('/programmes',                      fn() => view('pages.programmes'))->name('programmes');
Route::get('/programmes/statutory',             fn() => view('pages.programmes.statutory'))->name('programmes.statutory');
Route::get('/programmes/non-statutory',         fn() => view('pages.programmes.non-statutory'))->name('programmes.non-statutory');
Route::get('/programmes/pre-bar-course',        fn() => view('pages.programmes.pre-bar-course'))->name('programmes.pre-bar-course');
Route::get('/examinations',                     fn() => view('pages.examinations'))->name('examinations');
Route::get('/academic-calendar',                fn() => view('pages.academic-calendar'))->name('academic-calendar');

Route::get('/admissions', fn() => view('pages.admissions'))->name('admissions');
Route::get('/events',     fn() => view('pages.events'))->name('events');
Route::get('/news',       fn() => view('pages.news'))->name('news');
Route::get('/alumni',     fn() => view('pages.alumni'))->name('alumni');
Route::get('/contact',    fn() => view('pages.contact'))->name('contact');
