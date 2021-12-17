<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PoemistController;

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
    return view('pages');
})->middleware(['auth'])->name('dashboard');

Route::get('/pages',[PageController::class, 'index'])->name('pages.index');
Route::get('/pages/create',[PageController::class, 'create'])->name('pages.create');
Route::post('/pages',[PageController::class, 'store'])->name('pages.store');
Route::put('/pages/{page}/update',[PageController::class, 'update'])->name('pages.update');
Route::get('/pages/{page}',[PageController::class, 'show'])->name('pages.show');
Route::get('/pages/{page}/edit',[PageController::class, 'edit'])->name('pages.edit');
Route::delete('/pages/{page}',[PageController::class, 'destroy'])->name('pages.destroy');

Route::get('/reviews',[ReviewController::class, 'index'])->name('reviews.index');
Route::get('/reviews/create',[ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews',[ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{review}',[ReviewController::class, 'show'])->name('reviews.show');
Route::delete('/reviews/{review}',[ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::get('/books',[BookController::class, 'index'])->name('books.index');
Route::get('/books/create',[BookController::class, 'create'])->name('books.create');
Route::post('/books',[BookController::class, 'store'])->name('books.store');
Route::get('/books/{ISBN}',[BookController::class, 'show'])->name('books.show');
Route::delete('/books/{ISBN}',[BookController::class, 'destroy'])->name('books.destroy');

Route::post('/comment/store',[CommentController::class, 'store'])->name('comment.add');

Route::get('/poem',[PoemistController::class, 'index'])->name('poem.index');

require __DIR__.'/auth.php';
