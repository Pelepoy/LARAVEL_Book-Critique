<?php

use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
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

Route::resource('books', BookController::class);
Route::middleware(['non_auth_review_throttle', 'auth_review_throttle'])->group(function () {
  Route::resource('books.reviews', ReviewController::class)
    ->scoped(['review' => 'book'])
    ->only(['create', 'store']);
});

Route::controller(UserController::class)->group(function () {
  Route::get('register', 'register')->name('register.form');
  Route::post('register', 'store')->name('register.store');
  Route::get('login', 'login')->name('login');
  Route::post('login', 'authenticate')->name('login.authenticate');
  Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// ! for testing purposes
Route::middleware('reset_throttle')->get('/reset-throttle', function () {
  return "Throttle reset!!!";
});
