<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Book routes
Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/newBook', [BookController::class, 'create']);
Route::post('/newBook', [BookController::class, 'store'])->name('newBook');

// App routes
Route::get('/about', function () {
    return view('about');
});
