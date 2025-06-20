<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index']);
Route::post('/books/filter', [BookController::class, 'filterBooks'])->name('books.filter');

Route::get('/authors', [AuthorController::class, 'index'])->name('authors.list');
