<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/books', \App\Http\Controllers\BookController::class);

Route::get('/create', [\App\Http\Controllers\BookController::class, 'create'])->name('create');

Route::get('/update-book/{id}', [BookController::class, 'getBookbyId'])->name('getBookbyId');

Route::patch('/update-book/{id}', [BookController::class, 'updateBook'])->name('updateBook');

Route::delete('/delete-book/{id}', [BookController::class, 'deleteBook'])->name('delete');

Route::resource('/visitors', \App\Http\Controllers\VisitorController::class);

Route::get('/add-visitors', [\App\Http\Controllers\VisitorController::class, 'create'])->name('create');

Route::get('/review/{id}', [BookController::class, 'getBooktoReviewbyId'])->name('getBooktoReviewbyId');

Route::patch('/review/{id}', [BookController::class, 'giveReviews'])->name('review');