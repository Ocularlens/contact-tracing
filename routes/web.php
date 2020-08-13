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
Route::get('/', function() {
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://thevirustracker.com/free-api?countryTimeline=PH",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Cookie: __cfduid=d8a3ce715a1fca29afcfed0e6372561e91595679594"
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    $data = json_decode($response, true);
    $record = $data['timelineitems'][0][date('n/d/y',strtotime("-1 days"))];

    return view('home.index')->with([
        'record' => $record,
    ]);
})->name('home');

Route::view('/register', 'home.register');

Route::view('/about', 'home.about');

Route::get('/login', function(){
    if(Auth::guard('web')->check()){
        return redirect('dashboard');
    }
    else{
        return view('home.login');
    }
})->name('login');

Route::post('/register', 'PersonController@store');

Route::post('/login', 'LoginController@login');

//group dashboard routes
Route::group(array('prefix'=>'dashboard'), function(){
    Route::get('/', 'DashboardController@index');

    Route::get('/logout', 'DashboardController@logout');

    Route::view('/change-password', 'dashboard.change-password');

    Route::view('/change-email', 'dashboard.change-email');

    Route::view('/change-contact', 'dashboard.change-contact');

    Route::post('/change-password', 'PersonController@change_password');

    Route::post('/change-email', 'PersonController@change_email');

    Route::post('/change-contact', 'PersonController@change_contact');

    Route::get('/store/{store}/logs', 'StoreController@logs');

    Route::get('/store/{qrcode}/qrlog', 'StoreController@log_visit');

    Route::resource('store', 'StoreController');
});

Route::group(array('prefix'=>'admin'), function() {
    Route::get('/', 'AdminHomeController@index');

    Route::get('/login', 'LoginController@showAdminLoginForm');

    Route::post('/login', 'LoginController@adminLogin');

    Route::get('/users', 'AdminHomeController@users');

    Route::get('/stores', 'AdminHomeController@stores');

    Route::get('/users/{id}/delete', 'AdminHomeController@delete_user');

    Route::get('/stores/{id}/delete', 'AdminHomeController@delete_store');

    Route::get('/logout', 'AdminHomeController@logout');

    Route::group(array('prefix'=>'admins'), function() {
        Route::get('/', 'AdminHomeController@admins');

        Route::view('/new-admin', 'admin.new-admin');

        Route::post('/new-admin', 'AdminController@store');
    });

    Route::group(array('prefix'=>'account'), function() {
        Route::get('/', 'AdminController@index');

        Route::post('/change-username', 'AdminController@change_username');

        Route::post('/change-password', 'AdminController@change_password');
    });
});
