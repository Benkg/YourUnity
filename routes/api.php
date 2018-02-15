<?php

use Illuminate\Http\Request;

use App\Event;
use App\ActivityRecord;
use App\Attendee;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
| New comment
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('events', ['middleware' => 'cors', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    // return Event::orderBy('starts')->where('time_state', '>', 0)->get();
    $events = DB::table('events')->orderBy('starts')->where('time_state', '>', 0)->get()->toJson();
    $events = json_decode($events, true);

    $events_slim = [];

    foreach($events as $e) {

        $location = DB::table('locations')->where([
            ['user_id', '=', $e['user_id']],
            ['location_id', '=', $e['location_id']]
        ])->get()->toJson();

        $location = json_decode($location, true);

        $e = array_merge($e, $location);

        array_push($events_slim, $e);
    }
    // ->join('locations', 'events.location_id', '=', 'locations.location_id')->
    return $events_slim;
}]);

Route::get('events/{id}', function($id) {
    return Event::find($id);
});

Route::get('user_events/{user}', 'EventRegisterController@user_events');

Route::apiResource('register_event', 'EventRegisterController', ['only' => [
    'store', 'destroy'
    ]]);

Route::post('check', ['middleware' => 'cors', function(Request $request) {
    $attendee = Attendee::where('firedb_id','=', $request->input('firedb_id'))->get();
        $id = $attendee[0]->id;

        DB::update('update activity_records set
            check_in_time = :check_in_time,
            duration = :duration,
            activity_status = :activity_status
            where attendee_id = :attendee_id and event_id = :event_id', [
                'attendee_id' => $id,
                'event_id' => $request->input('event_id'),
                'check_in_time' => $request->input('check_in_time'),
                'duration' => $request->input('duration'),
                'activity_status'=> $request->input('activity_status')
        ]);

        // If the user is checking in to the event, increment num_attended
        if($request->input('duration') == 0) {
            DB::table('events')->where('id', '=',$request->input('event_id'))->increment('num_attended');

            // Get user id from event
            $event = Event::where('id', $request->input('event_id'))->first();
            $user_id = $event->user_id;

            // Update user table as well for number of people who attended their events
            DB::table('users')->where('id', '=', $user_id)->increment('num_people_events');
        }
}]);


//, 'EventRegisterController@update');

Route::post('add_attendee', ['middleware' => 'cors', function(Request $request) {
    Attendee::create([
        'firedb_id' => $request->input('firedb_id'),
        'email' => $request->input('email'),
    ]);

    DB::update('update attendees set
        name_first = :name_first,
        name_last = :name_last
        where firedb_id = :firedb_id', [
            'firedb_id' => $request->input('firedb_id'),
            'name_first' => $request->input('name_first'),
            'name_last' => $request->input('name_last')
    ]);
}]);

Route::post('update_attendee', ['middleware' => 'cors', function(Request $request) {
    DB::update('update attendees set
        email = :email
        where firedb_id = :firedb_id', [
            'firedb_id' => $request->input('firedb_id'),
            'email' => $request->input('email')
    ]);
}]);

//, 'AddAttendeeController@store');

Route::options('add_attendee', 'MainController@options');

Route::patch('add_attendee', ['middleware' => 'cors', function(Request $request) {
    DB::update('update attendees set
            name_first = :name_first,
            name_last = :name_last,
            email = :email
            where firedb_id = :firedb_id', [
                'firedb_id' => $request->input('firedb_id'),
                'name_first' => $request->input('name_first'),
                'name_last' => $request->input('name_last'),
                'email' => $request->input('email')
    ]);
}]);

Route::patch('add_attendee/{user}', 'AddAttendeeController@update');

//, 'AddAttendeeController@update');

Route::get('user/{user}', function($user){
    return ActivityRecord::where('attendee_id', $user)->get();
});
