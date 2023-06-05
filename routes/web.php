<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/books');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->middleware('auth')->name('books.create');
Route::post('/books', [BookController::class, 'store'])->middleware('auth')->name('books.store');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->middleware('auth')->can('update-delete-book,book')->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->middleware('auth')->can('update-delete-book,book')->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->middleware('auth')->can('update-delete-book,book')->name('books.destroy');

Auth::routes();
