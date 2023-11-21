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

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/auth/login', 'App\Http\Controllers\Auth\LoginController@loginForm')
        ->name('auth.login.form');
    Route::post('/auth/login', 'App\Http\Controllers\Auth\LoginController@login')
        ->name('auth.login');
    Route::get('/auth/register', 'App\Http\Controllers\Auth\RegisterController@registerForm')
        ->name('auth.register.form');
    Route::post('/auth/register', 'App\Http\Controllers\Auth\RegisterController@register')
        ->name('auth.register');
});

Route::get('products', 'App\Http\Controllers\ProductsController@index')->name('products.index');
Route::get('basket/add/{product}', 'App\Http\Controllers\BasketController@add')->name('basket.add');
Route::get('basket', 'App\Http\Controllers\BasketController@index')->name('basket.index');
Route::post('basket/update/{product}', 'App\Http\Controllers\BasketController@update')->name('basket.update');
Route::get('basket/checkout', 'App\Http\Controllers\BasketController@checkoutForm')->name('basket.checkout.form');
Route::post('basket/checkout', 'App\Http\Controllers\BasketController@checkout')->name('basket.checkout');
Route::post('payment/{gateway}/callback', 'App\Http\Controllers\PaymentController@verify')->name('payment.verify');
Route::post('coupon' , 'App\Http\Controllers\CouponsController@store')->name('coupons.store');
Route::post('coupon/remove' , 'App\Http\Controllers\CouponsController@remove')->name('coupons.remove');
