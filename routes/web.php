<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;

// View all books
Route::get('/', [BookController::class, 'index'])->name('home');
// Create a new book
Route::get('/newBook', [BookController::class, 'create']);
Route::post('/newBook', [BookController::class, 'store'])->name('newBook');
// Update a book
Route::get('/editBook/{id}', [BookController::class, 'edit']);
Route::put('/editBook/{id}', [BookController::class, 'update'])->name('editBook');

// View all loans
Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
// Create new loan
Route::get('/loans/create/{book_id}', [LoanController::class, 'create'])->name('loans.create');
Route::post('/loans/store', [LoanController::class, 'store'])->name('newLoan');
// Return book
Route::get('/loans/{loan}/return', [LoanController::class, 'edit'])->name('loans.return');
Route::put('/loans/{loan}', [LoanController::class, 'update'])->name('loans.update');
Route::delete('/loans/{loan}', [LoanController::class, 'destroy'])->name('loans.destroy');


// App routes
Route::get('/about', function () {
    return view('about');
});
