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

Route::get('/legal/menu', 'MainController@menu');

                      /* Main Index, Login, Register Routes */
Route::get('/', 'MainController@index');
Route::get('/login', 'MainController@login');
Route::get('/registration/{access}', 'MainController@register');

                      /* Route for Access Code */
Route::get('/access', 'MainController@access');
Route::post('/access', 'MainController@granted');

                      /* Contact Routes */
Route::get('/contact', 'ContactController@index');
Route::get('/contact/feedback', 'ContactController@feedback');
Route::get('/contact/direct', 'ContactController@direct');
Route::get('/contact/report', 'ContactController@report');

Route::post('/contact', 'ContactController@store');

                      /* Event Routes */
Route::get('/events', 'EventsController@index');
Route::post('/events', 'EventsController@store');
Route::get('/events/create', 'EventsController@create');
Route::get('/events/{event}', 'EventsController@show');
Route::get('/events/{event}/edit', 'EventsController@edit');
Route::post('/events/{event}/edit', 'EventsController@patch');
Route::get('/events/{event}/delete', 'EventsController@getDelete');
Route::post('/events/{event}/delete', 'EventsController@delete');
Route::get('/events/{event}/duplicate', 'EventsController@duplicate');

Route::get('/legal/service', 'LegalController@service');
Route::get('/legal/users', 'LegalController@users');
Route::get('/legal/cookies', 'LegalController@cookies');
Route::get('/legal/privacy', 'LegalController@privacy');
Route::get('/legal/community', 'LegalController@community');
Route::get('/legal/ip', 'LegalController@ip');

                      /* Attachment Routes */
Route::get('/attachments/manager', 'AttachmentController@manager');
Route::post('/attachments/upload', 'AttachmentController@store');
Route::post('/attachments/delete', 'AttachmentController@delete');

Route::get('/attachments/{event}', 'AttachmentController@uploadForm');
Route::post('/attachments/attach', 'EventAttachmentController@store');
Route::post('/attachments/remove', 'EventAttachmentController@remove');
//Route::post('/attach'), 'UploadController@attach');
//Route::get('/storage/{attachmentURL}', 'UploadController@show');

                      /* Login and Register Routes ??? */
Auth::routes();

                      /* Dashboards Index Route */
Route::get('/dashboard', 'HomeController@index');

                      /* Settings Routes */
Route::get('/settings', 'SettingsController@index');
Route::get('/settings/edit', 'SettingsController@edit');
Route::post('/settings', 'SettingsController@store');
Route::post('/settings/edit', 'SettingsController@update');
