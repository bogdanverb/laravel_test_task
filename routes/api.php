<?php

use Illuminate\Support\Facades\Route;

Route::get('genres', [App\Http\Controllers\Api\GenreApiController::class, 'index']);
Route::get('genres/{id}', [App\Http\Controllers\Api\GenreApiController::class, 'show']);
Route::get('movies', [App\Http\Controllers\Api\MovieApiController::class, 'index']);
Route::get('movies/{id}', [App\Http\Controllers\Api\MovieApiController::class, 'show']);
