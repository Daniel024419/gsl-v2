<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsletterSubscriptionController;
use App\Http\Controllers\PageController;
use App\Models\DepartmentHead;
use App\Models\EnrollmentCommitteeMember;
use App\Models\GoverningBodyMember;
use App\Models\InstitutionalMemoryMember;
use App\Models\LeadershipMember;
use Illuminate\Support\Facades\Route;

Route::get('/',           [HomeController::class, 'index'])->name('home');

Route::redirect('/about', '/about/overview')->name('about');
Route::get('/about/gsl-clet',   fn() => view('pages.about.gsl-clet'))->name('about.gsl-clet');
Route::get('/about/overview',   fn() => view('pages.about.overview'))->name('about.overview');
Route::get('/about/history',    fn() => view('pages.about.history'))->name('about.history');
Route::get('/about/management', function () {
    return view('pages.about.management', [
        'leadership' => LeadershipMember::with(['person', 'role'])->visible()->ordered()->get(),
        'governingBody' => GoverningBodyMember::with(['person', 'role'])->visible()->ordered()->get(),
        'institutionalMemory' => InstitutionalMemoryMember::with('person')->visible()->ordered()->get(),
        'enrollmentCommittee' => EnrollmentCommitteeMember::with(['person', 'role'])->visible()->ordered()->get(),
        'departmentHeads' => DepartmentHead::with(['person', 'role'])->visible()->ordered()->get(),
    ]);
})->name('about.management');

Route::get('/programmes',                      fn() => view('pages.programmes'))->name('programmes');
Route::get('/programmes/pre-bar-course',        fn() => view('pages.programmes.pre-bar-course'))->name('programmes.pre-bar-course');
Route::get('/programmes/law-practice-training', fn() => view('pages.programmes.law-practice-training'))->name('programmes.law-practice-training');
Route::get('/programmes/post-call-law-course',  fn() => view('pages.programmes.post-call-law-course'))->name('programmes.post-call-law-course');
Route::get('/examinations',                     fn() => view('pages.examinations'))->name('examinations');
Route::get('/academic-calendar',                fn() => view('pages.academic-calendar'))->name('academic-calendar');

Route::get('/admissions',              fn() => view('pages.admissions'))->name('admissions');
Route::get('/admissions/instructions', fn() => view('pages.admissions-instructions'))->name('admissions.instructions');

Route::get('/notices', function () {
    return view('pages.notices', ['notices' => config('notices.notices')]);
})->name('notices');
Route::get('/student-life', fn() => view('pages.student-life'))->name('student-life');

Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/{event:slug}', [EventController::class, 'show'])->name('events.show');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{article:slug}', [NewsController::class, 'show'])->name('news.show');

Route::post('/newsletter/subscribe', [NewsletterSubscriptionController::class, 'store'])->name('newsletter.subscribe');

Route::get('/alumni',     fn() => view('pages.alumni'))->name('alumni');
Route::get('/contact',    fn() => view('pages.contact'))->name('contact');

Route::get('/pages/{page:slug}', [PageController::class, 'show'])->name('page.show');