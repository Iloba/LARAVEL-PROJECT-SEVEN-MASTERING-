<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

// Route::get('/posts', function () {
//     return view('posts.index');
// });

Route::get('/', function () {
    return view('home');
})->name('home');

//register route
Route::get('/register', [RegisterController::class, 'index'])->name('register');

//Post controller
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);

//Store user route
Route::post('/register', [RegisterController::class, 'store']);

//dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

//login route
Route::get('/login', [LoginController::class, 'index'])->name('login');

//Login User
Route::post('/login', [LoginController::class, 'LoginUser']);

//Logout User
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//Like Route
Route::post('/post/{post}/likes', [PostLikeController::class, 'like'])->name('posts.likes');

