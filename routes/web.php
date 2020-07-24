<?php

use BaconQrCode\Encoder\QrCode;
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
//home routes
Route::view('/', 'home.index')->name('home');

Route::view('/register', 'home.register');

Route::view('/about', 'home.about');

Route::view('/login', 'home.login')->name('login');

Route::post('/register', 'PersonController@store');

Route::post('/login', 'LoginController@login');


//group dashboard routes
Route::group(array('prefix'=>'dashboard'), function(){
    Route::get('/', 'DashboardController@index')->middleware('auth');

    Route::get('/logout', 'DashboardController@logout')->middleware('auth');

    Route::view('/change-password', 'dashboard.change-password')->middleware('auth');

    Route::view('/change-email', 'dashboard.change-email')->middleware('auth');

    Route::view('/change-contact', 'dashboard.change-contact')->middleware('auth');

    Route::post('/change-password', 'PersonController@change_password')->middleware('auth');

    Route::post('/change-email', 'PersonController@change_email')->middleware('auth');

    Route::post('/change-contact', 'PersonController@change_contact')->middleware('auth');

    Route::get('/store/{store}/logs', 'StoreController@logs');

    Route::get('/store/{qrcode}/qrlog', 'StoreController@log_visit');

    Route::resource('store', 'StoreController');
});