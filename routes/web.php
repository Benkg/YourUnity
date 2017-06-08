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

Route::get('/', 'MainController@index');

Route::get('/events/create', 'EventsController@create');
Route::get('/events', 'EventsController@index');
Route::get('/events/{event}', 'EventsController@show');

Route::get('/login', 'MainController@login');
Route::get('/register', 'MainController@register');

Route::post('/events', 'EventsController@store');

Auth::routes();

Route::get('/dashboard', 'HomeController@index');

Route::get('/settings', 'SettingsController@index');
Route::post('/settings', 'SettingsController@store');
