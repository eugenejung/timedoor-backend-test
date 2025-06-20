<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');
Route::post('/books/filter', [BookController::class, 'filterBooks'])->name('books.filter');
Route::get('/books/by-author/{id}', [BookController::class, 'filterBooksByAuthor']);

Route::get('/authors', [AuthorController::class, 'index'])->name('authors.list');

Route::get('/ratings', [RatingController::class, 'index'])->name('ratings.vote');
Route::post('/ratings', [RatingController::class, 'storeRating'])->name('ratings.store');
