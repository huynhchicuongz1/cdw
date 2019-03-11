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

Route::get('/','FlightController@index')->name('index');
Route::get('/get-register','UserController@register')->name('register');
Route::post('/register','UserController@postRegister')->name('register-post');
Route::get('/login-get','UserController@getLogin')->name('login-get');
Route::post('/login-post','UserController@login_post')->name('login-post');
Route::get('/logout','UserController@logout')->name('logout');
Route::get('/edit-profile','UserController@edit_profile')->name('edit-profile');
Route::post('/edit-profile-post','UserController@edit_profile_post')->name('edit-profile-post');
Route::get('/flight-list','FlightController@searchFlight')->name('flight-list');
Route::get('/detail-flight',"FlightController@getDetail")->name('detail-flight');
Route::post('/booking-flight',"FlightController@viewBookingFlight")->name('booking-flight');
Route::post('/get-booking-flight',"FlightController@getBookingFlight")->name('get-booking-flight');
