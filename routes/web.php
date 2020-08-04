<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
  return redirect()->route('property.index');
});

Route::get('/real-estate', 'PropertyController@index')->name('property.index');
Route::get('/real-estate/search', 'PropertyController@search')->name('property.search');
Route::get('/real-estate/list', 'PropertyController@list')->name('property.list');
Route::get('/real-estate/{property}', 'PropertyController@show')->name('property.show');
Route::post('/real-estate/priceChanger', 'PropertyController@priceChanger')->name('property.priceChanger');

//additional-page
Route::get('/real-estate/rent', 'PropertyController@rent')->name('property.rent');
Route::get('/real-estate/buy', 'PropertyController@buy')->name('property.buy');
Route::get('/real-estate/mortage', 'PropertyController@mortage')->name('property.mortage');

//user accounts
Route::get('/account/login', 'UserController@accountLogin')->name('user.login');
Route::get('/account/logout', 'UserController@accountLogout')->name('user.logout');
Route::post('/account/login', 'UserController@store')->name('user.store');

Route::get('/account/{page}', 'UserController')->name('page');

Route::post('/account/user-profile', 'UserController@accountUpdate')->name('user.accountUpdate');
Route::post('/account/user-profile/password-change', 'UserController@passwordChange')->name('user.account.passwordChange');
Route::post('/account/user-profile/profile-img-change', 'UserController@profileImgChange')->name('user.account.profileImgChange');
