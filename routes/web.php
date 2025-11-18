<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, "index"]);

Route::get('series', [SeriesController::class, "index"])->name('series.index');

Route::get('series/{id}', [SeriesController::class, "show"])->name('series.show');

Route::get('genres', [GenreController::class, "index"])->name('genre.index');
Route::get('genres/{id}', [GenreController::class, "show"])->name('genre.show');
Route::get('genres/create', [GenreController::class, "create"])->name('genre.create');
Route::get('genres/{id}/edit', [GenreController::class, "edit"])->name('genre.edit');
Route::post('genres', [GenreController::class, "store"])->name('genre.store');
Route::put('genres/{id}', [GenreController::class, "update"])->name('genre.update');
Route::delete('genres/{id}', [GenreController::class, "destroy"])->name('genre.destroy');

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
