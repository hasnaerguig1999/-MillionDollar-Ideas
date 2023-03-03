<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[App\Http\Controllers\PagesController::class, 'index']);

Route::resource('/blog',PostsController::class);
Route::resource('/comments',CommentsController::class);
Route::resource('/likes',LikesController::class)->middleware('auth');
Route::resource('search',PostsController::class)->middleware('auth');
Route::get('/search',[App\Http\Controllers\PostsController::class, 'searchByTitle'])->name('search');
Route::get('comment/{id}/like',[App\Http\Controllers\LikesController::class, 'like'])->name('comment.like');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
