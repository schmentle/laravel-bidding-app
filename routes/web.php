<?php

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

Route::get('/', 'ProductController@index')->name('home');
Route::resource('products', 'ProductController')->only([
    'index', 'show'
]);
Route::resource('bids', 'BidController')->only([
    'index', 'create', 'store'
]);
Route::resource('users', 'UserController')->only([
    'index', 'create'
]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
