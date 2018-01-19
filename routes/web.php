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

/* MAIN-CONTROLLER (Login, Register Routes and Access Code) */
Route::get('/',                         'MainController@index');
Route::get('/login',                    'MainController@login');
Route::get('/registration/{access}',    'MainController@register');
Route::get('/access',                   'MainController@access');
Route::post('/access',                  'MainController@granted');

/* HOME-CONTROLLER */
Route::get('/dashboard',                'HomeController@index');

/* AUTHORIZATION */
Auth::routes();

/* CONTACT-CONTROLLER (Feedback, Contact, and Reports) */
Route::get('/contact',                  'ContactController@index');
Route::get('/contact/feedback',         'ContactController@feedback');
Route::get('/contact/direct',           'ContactController@direct');
Route::get('/contact/report',           'ContactController@report');
Route::post('/contact',                 'ContactController@store');

/* EVENT-CONTROLLER */
Route::get('/events',                   'EventsController@index');
Route::post('/events',                  'EventsController@store');
Route::get('/events/create',            'EventsController@create');
Route::get('/events/{event}',           'EventsController@show');
Route::get('/events/{event}/edit',      'EventsController@edit');
Route::post('/events/{event}/edit',     'EventsController@patch');
Route::get('/events/{event}/delete',    'EventsController@getDelete');
Route::post('/events/{event}/delete',   'EventsController@delete');
Route::get('/events/{event}/duplicate', 'EventsController@duplicate');

/* LEGAL-CONTROLLER */
Route::get('/legal/service',            'LegalController@service');
Route::get('/legal/users',              'LegalController@users');
Route::get('/legal/cookies',            'LegalController@cookies');
Route::get('/legal/privacy',            'LegalController@privacy');
Route::get('/legal/community',          'LegalController@community');
Route::get('/legal/ip',                 'LegalController@ip');

/* ATTACHMENT-CONTROLLER */
Route::get('/attachments/manager',      'AttachmentController@manager');
Route::post('/attachments/upload',      'AttachmentController@store');
Route::post('/attachments/delete',      'AttachmentController@delete');
Route::get('/attachments/{event}',      'AttachmentController@attach');

/* EVENT-ATTACHMENT-CONTROLLER */
Route::post('/attachments/attach',      'EventAttachmentController@update');
Route::post('/attachments/remove',      'EventAttachmentController@remove');

/* SETTINGS-CONTROLLER */
Route::get('/settings',                 'SettingsController@index');
Route::get('/settings/edit',            'SettingsController@edit');
Route::post('/settings',                'SettingsController@store');
Route::post('/settings/edit',           'SettingsController@update');

/* PUBLIC-CONTROLLER (Organization Page, Events, and Check-in) */
Route::get('/{organization}',                'PublicController@events');
Route::get('/{organization}/{event}',        'PublicController@event');
Route::get('/{organization}/{event}/signin', 'PublicController@signinform');
Route::post('/{organization}/{event}/signin','PublicController@signin');

/* DOWNLOADS-CONTROLLER (Organization Page, Events, and Check-in) */
Route::post('/download/{event}',           'DownloadsController@event');
Route::post('/download/all',               'DownloadsController@all');
