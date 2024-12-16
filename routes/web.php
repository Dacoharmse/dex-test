<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageV1Controller;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BannerController;

// Home and ICO Routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('upcoming-icos', [HomeController::class, 'upcomingIcos'])->name('upcoming.icos');
Route::get('past-icos', [HomeController::class, 'pastIcos'])->name('past.icos');

// Project Routes
Route::get('/ico/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/submit-ico', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/submit-ico', [ProjectController::class, 'store'])->name('projects.store');
Route::post('/projects/{projectId}/boost', [ProjectController::class, 'boost'])->name('projects.boost');
Route::post('/projects/{projectId}/vote', [ProjectController::class, 'vote']);
Route::post('/projects/{projectId}/shit', [ProjectController::class, 'shit']);
Route::post('/projects/{projectId}/flag', [ProjectController::class, 'flag']);

// Search Tokens
Route::get('/search-tokens', [SearchController::class, 'searchTokens'])->name('search.tokens');

// Contact Us
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.show');
Route::post('/contact-us', [ContactController::class, 'send'])->name('contact.send');

// Advertisement and Promote
Route::get('/advertisement', [AdvertisementController::class, 'index'])->name('advertisement');
Route::get('/promote', function () {
    return view('promote');
})->name('promote');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Voyager Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Dynamic Pages
Route::get('/{page}', [PageV1Controller::class, 'show'])->name('page.show');
