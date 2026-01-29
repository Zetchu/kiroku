<?php

use App\Http\Controllers\Api\SeriesController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/series', [SeriesController::class, 'index'])->name('api.series.index');
Route::get('/series/{id}', [SeriesController::class, 'show'])->name('api.series.show');

// Authenticated Routes
Route::middleware('auth:sanctum')->group(function () {
    //  add ReviewController routes here later
});
