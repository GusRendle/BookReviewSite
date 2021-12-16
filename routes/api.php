<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('comments/{id}/{poly}', [CommentController::class, 'apiIndex'])->name('api.comments.index');
Route::middleware('auth:sanctum')->post('/comments/{poly}', [CommentController::class, 'apiStore'])->name('api.comments.store'); 
