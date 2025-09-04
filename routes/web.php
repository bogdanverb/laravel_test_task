<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;

Route::get('/', function () {
    return redirect()->route('movies.index');
});

Route::resource('movies', MovieController::class);
Route::resource('genres', GenreController::class);
Route::post('movies/{movie}/publish', [MovieController::class, 'publish'])->name('movies.publish');
