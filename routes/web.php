<?php

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

Route::get('/', function () {
    return view('pages.home.home');
})->name('home');

Route::get('/cart', function () {
    return view('pages.cart.cart');
})->name('cart');

Route::get('/cart-with-alpinejs', function () {
    return view('pages.cart-with-alpinejs.cart-with-alpinejs');
})->name('cart-with-alpinejs');
