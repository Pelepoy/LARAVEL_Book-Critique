<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ReviewController;

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

Route::redirect('/', '/books', 301);

Route::resource('books', BookController::class)
  ->only(['index', 'show', 'create', 'store']);

Route::resource('books.reviews', ReviewController::class)
  ->scoped(['review' => 'book'])
  ->only(['create', 'store']);

Route::get('register', [UserController::class, 'register'])->name('register.form');
Route::post('register', [UserController::class, 'store'])->name('register.store');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'authenticate'])->name('login.authenticate');
