<?php

use Illuminate\Http\Request;

use App\Event;
use App\ActivityRecord;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('events', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Event::orderBy('starts')->get();
});

Route::get('events/{id}', function($id) {
    return Event::find($id);
});

Route::get('user_events/{user}', function($user) {
    return Event::where('attendee_id', $attendee_id)->get();
});

Route::apiResource('register_event', 'EventRegisterController', ['only' => [
    'store', 'destroy'
    ]]);

Route::patch('checkin/{user}/{event}', 'EventRegisterController@update');

Route::apiResource('add_attendee', 'AddAttendeeController', ['only' => [
    'store', 'destroy'
    ]]);

Route::patch('add_attendee/{user}', 'AddAttendeeController@update');
