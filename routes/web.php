<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'PropertyController@index');

/** Property realestate routes */
Route::group(['prefix' => 'real-estate'], function () {
  Route::get('/', 'PropertyController@index')->name('property.index');
  Route::get('/search', 'PropertyController@search')->name('property.search');
  Route::get('/list', 'PropertyController@list')->name('property.list');
  Route::post('/priceChanger', 'PropertyController@priceChanger')->name('property.priceChanger');
  Route::get('/buy', 'PropertyController@buy')->name('property.buy');
  Route::get('/rent', 'PropertyController@rent')->name('property.rent');
  Route::get('/mortage', 'PropertyController@mortage')->name('property.mortage');
  Route::get('/{property}-{slug}', 'PropertyController@show')->name('property.show');
  Route::post('/property-application', 'PropertyApplicationController@store')->name('property.storeApplication');
});

//user accounts
Route::group(['prefix' => 'account'], function () {
  Route::get('/login', 'AccountController@accountLogin')->name('user.login');
  Route::get('/logout', 'AccountController@accountLogout')->name('user.logout');
  //creating a user
  Route::post('/login', 'UserController@store')->name('user.store');

  //grouped routes for static pages
  Route::get('/{page}', 'AccountController')
    ->name('page')
    ->where('page', 'user-profile|saved-homes|rental-resume');

  //account/* routes for UserPropertyController
  Route::get('/property-listings', 'UserPropertyController@index')->name('user.propertyListings');
  Route::get('/property-listings/create', 'UserPropertyController@create')->name('user.propertyCreate');
  Route::get('/property-listings/{property}', 'UserPropertyController@show')->name('user.propertyShow');
  Route::post('/property-listings', 'UserPropertyController@store')->name('user.propertyStore');
  Route::get('/property-listings/{property}/edit', 'UserPropertyController@edit')->name('user.propertyEdit');
  Route::put('/property-listings/{property}', 'UserPropertyController@update')->name('user.propertyUpdate');
  Route::delete('/property-listings/{property}', 'UserPropertyController@destroy')->name('user.propertyDestroy');

  Route::post('/user-profile', 'AccountController@accountUpdate')->name('user.accountUpdate');
  Route::post('/user-profile/password-change', 'AccountController@passwordChange')->name('user.account.passwordChange');
  Route::post('/user-profile/profile-img-change', 'AccountController@profileImgChange')->name('user.account.profileImgChange');
});
