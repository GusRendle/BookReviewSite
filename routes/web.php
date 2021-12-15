<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/pages',[PageController::class, 'index'])->name('pages.index');
Route::get('/page/{id}',[PageController::class, 'show'])->name('pages.show');

Route::get('/review/{id}',[ReviewController::class, 'show'])->name('review.show');

Route::get('/books',[BookController::class, 'index'])->name('books.index');
Route::get('/book/{ISBN}',[BookController::class, 'show'])->name('books.show');

require __DIR__.'/auth.php';
