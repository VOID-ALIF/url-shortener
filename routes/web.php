<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortenerController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UrlShortenerController::class, 'index'])->name('home');
Route::post('/shorten', [UrlShortenerController::class, 'create'])->name('shorten');
Route::get('/{code}', [UrlShortenerController::class, 'redirect']);
