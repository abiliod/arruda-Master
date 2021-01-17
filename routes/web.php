<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Cart\CartController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [CartController::class, 'index'])->name('/');
Route::get('/welcome', [CartController::class, 'index'])->name('index');
Route::get('/about_site', [CartController::class, 'sobre'])->name('sobre');
Route::get('/contact_site', [CartController::class, 'contato'])->name('contato');
Route::get('/cart_site', [CartController::class, 'cart'])->name('cart');
Route::get('/product_detail', [CartController::class, 'product_detail'])->name('product_detail');
Route::get('/checkout_site', [CartController::class, 'checkout'])->name('checkout');
Route::get('/order_complete', [CartController::class, 'order_complete'])->name('order_complete');
Route::get('/add_to_wishlist', [CartController::class, 'add_to_wishlist'])->name('add_to_wishlist');
Route::get('/women', [CartController::class, 'women'])->name('women');
Route::get('/men', [CartController::class, 'men'])->name('men');
Route::get('/search', [CartController::class, 'search'])->name('search');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
