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

Route::get('/', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/', 'Auth\RegisterController@register');

Route::any('users/{email?}', 'UserController@index')->name('users');

Route::post('ajax-districts', 'Ajax\TerritorySelectorController@returnDistricts')->name('ajax.territory.districts');
Route::post('ajax-cities', 'Ajax\TerritorySelectorController@returnCities')->name('ajax.territory.cities');