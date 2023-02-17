<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\Blog\TagController;
use App\Http\Controllers\Home\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get("/article/{slug}", [PostController::class, 'show'])->name('post');
Route::get("/category/{slug}", [CategoryController::class, 'show'])->name('category');
Route::get("/tag/{slug}", [TagController::class, 'show'])->name('tag');

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/categories', 'Blog\CategoryController');
    Route::resource('/tags', 'Blog\TagController');
    Route::resource('/posts', 'Blog\PostController');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
});
