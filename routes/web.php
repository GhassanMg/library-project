<?php

use App\Http\Controllers\Dashboard\BookController;
use App\Http\Controllers\Dashboard\CartController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;
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


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('home');
    });
    //Route::group(['middleware' => ['role:admin,user']], function () {
        Route::view('about', 'about')->name('about');

        Route::get('profile', [UserController::class, 'show'])->name('profile.show');

        Route::resource('books', BookController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('users', UserController::class);

        //Cart Management
        //Route::resource('carts', CartController::class);
        route::get('get_user_cart',[CartController::class,'get_user_cart'])->name('user_cart');
        Route::get('add_book_to_cart', [CartController::class, 'add_book_to_cart'])->name('add_book_to_cart');
    //});
    Route::get('user/books', [BookController::class, 'get_user_books_by_user'])->name('user_books');
});
