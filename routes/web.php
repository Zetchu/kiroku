<?php

use App\Http\Controllers\AdminGenreController;
use App\Http\Controllers\AdminSeriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, "index"]);

Route::get('series', [SeriesController::class, "index"])->name('series.index');

Route::get('series/{id}', [SeriesController::class, "show"])->name('series.show');

Route::resource('genres', GenreController::class)->only(['index', 'show']);

Route::post('series/{id}/comments', [CommentsController::class, 'store'])
    ->middleware('auth')
    ->name('comments.store');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('index');

    Route::resource('genres', AdminGenreController::class);
    Route::resource('series', AdminSeriesController::class);
});

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
