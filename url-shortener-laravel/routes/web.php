<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortenedUrlController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/go/{shortCode}', [ShortenedUrlController::class, 'redirectToUrl']);
