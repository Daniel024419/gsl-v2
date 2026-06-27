<?php

use Illuminate\Support\Facades\Route;

Route::get('/',           fn() => view('welcome'))->name('home');
Route::get('/about',      fn() => view('pages.about'))->name('about');
Route::get('/programmes', fn() => view('pages.programmes'))->name('programmes');
Route::get('/admissions', fn() => view('pages.admissions'))->name('admissions');
Route::get('/events',     fn() => view('pages.events'))->name('events');
Route::get('/news',       fn() => view('pages.news'))->name('news');
Route::get('/contact',    fn() => view('pages.contact'))->name('contact');
