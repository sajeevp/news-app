<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\News\NewsController;
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

Route::get('/phpinfo', function () {
    return phpinfo();
});

Route::get('/', [NewsController::class, 'index'])->name('news');
Route::post('/add/news', [NewsController::class, 'store'])->name('news.add');
Route::post('/like/news/{item}', [NewsController::class, 'like'])->name('news.like');
Route::post('/delete/news/{item}', [NewsController::class, 'delete'])->name('news.delete');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/user/picture', [DashboardController::class, 'userPicture'])->name('user.picture');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
