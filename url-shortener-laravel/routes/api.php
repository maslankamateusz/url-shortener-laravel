<?php

use App\Http\Controllers\ShortenedUrlController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::post('/shorten', [ShortenedUrlController::class, 'shorten']);
    Route::get('/expand/{shortCode}', [ShortenedUrlController::class, 'expand']);
    Route::get('/links', [ShortenedUrlController::class, 'listShortenedUrls']);
});
