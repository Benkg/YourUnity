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
                      /* Main Index, Login, Register Routes */
Route::get('/', 'MainController@index');
Route::get('/login', 'MainController@login');
Route::get('/register', 'MainController@register');

                      /* Event Routes */
Route::get('/events', 'EventsController@index');
Route::post('/events', 'EventsController@store');
Route::get('/events/create', 'EventsController@create');
Route::get('/events/{event}', 'EventsController@show');
Route::get('/events/{event}/delete', 'EventsController@getDelete');
Route::get('/events/{event}/edit', 'EventsController@edit');
Route::post('/events/{event}/edit', 'EventsController@patch');
Route::post('/events/{event}/delete', 'EventsController@delete');

                      /* Login and Register Routes ??? */
Auth::routes();

                      /* Dashboards Index Route */
Route::get('/dashboard', 'HomeController@index');

                      /* Settings Routes */
Route::get('/settings', 'SettingsController@index');
Route::get('/settings/edit', 'SettingsController@edit');
Route::post('/settings', 'SettingsController@store');
