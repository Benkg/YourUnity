<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Mail\EventRegistration;
use Illuminate\Http\Request;
use App\ActivityRecord;
use App\Attendee;
use App\Event;
use Mail;
use Auth;


class EventRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attendee = Attendee::where('firedb_id','=', $request->input('firedb_id'))->get();
        $attendee_id = $attendee[0]->id;

        ActivityRecord::create([
            'event_id' => $request->input('event_id'),
            'user_id' => $request->input('user_id'),
            'attendee_id' => $attendee_id,
            'check_in_time' => $request->input('check_in_time'),
            'duration' => $request->input('duration'),
            'activity_status' => $request->input('activity_status')
        ]);

        DB::table('events')->where('id', '=', $request->input('event_id'))->increment('num_registered');

        //might have to use column index but names should work.
        $attendee_name = $attendee[0]->name_first;
        $attendee_name = (string)$attendee_name;

        $attendee_email = $attendee[0]->email;

        //get only future event with this id, returns null if not future state....
        $event_id = $request->input('event_id');
        $event = Event::where('id', $event_id)->first();

        $location_id = $event->location_id;
        $location = DB::table('locations')
                ->where('location_id', $location_id)
                ->where('user_id', $request['user_id'])
                ->first();
        $location_string = (string)($location->address .', '.$location->city.', '.$location->state.' '.$location->postal_code);

        //Send email to this user. Passes user info and event info
        Mail::to($attendee_email)->send(new EventRegistration($attendee_name, $event, $location_string));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $attendee_id, $event_id)
    {
        // $check_in_event = DB::table('activity_records')->where([['attendee_id', $user], ['event_id', $event]])->get();
        //
        // $check_in_event->check_in_time = request('check_in_time');
        // $check_in_event->duration = request('duration');
        // $check_in_event->activity_status = request('activity_status');
        // $check_in_event->save();

        $attendee = Attendee::where('firedb_id','=', $attendee_id)->get();
        $id = $attendee[0]->id;

        DB::update('update activity_records set
            check_in_time = :check_in_time,
            duration = :duration,
            activity_status = :activity_status
            where attendee_id = :attendee_id and event_id = :event_id', [
                'attendee_id' => $id,
                'event_id' => $event_id,
                'check_in_time' => $request->input('check_in_time'),
                'duration' => $request->input('duration'),
                'activity_status'=> $request->input('activity_status')
        ]);

        // If the user is checking in to the event, increment num_attended
        if($request->input('duration') == 0) {
            DB::table('events')->where('id', '=', $event_id)->increment('num_attended');

            // Get user id from event
            $event = Event::where('id', $event_id)->first();
            $user_id = $event->user_id;

            // Update user table as well for number of people who attended their events
            DB::table('users')->where('id', '=', $user_id)->increment('num_people_events');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function user_events($user) {
        // $events = DB::table('events')->orderBy('starts')->where('time_state', '>', 0)->get()->toJson();
        // $events = json_decode($events, true);

        // $events_slim = [];

        $attendee = Attendee::where('firedb_id','=', $user)->get();
        $id = $attendee[0]->id;

        $num_events = ActivityRecord::where('attendee_id','=', $id)->where('activity_status', 0)->count();
        $duration_array = ActivityRecord::where('attendee_id','=', $id)->get();
        $duration = 0;

        foreach($duration_array as $d) {
            $duration = $duration + $d->duration;
        }

        $event_ids =  ActivityRecord::where([
            ['attendee_id', '=', $id],
            ['activity_status', '>', 0]
            ])->get();

        $ids = [];
        $location_ids = [];

        foreach($event_ids as $event) {
            array_push($ids, $event->event_id);
        }

        $events = DB::table('events')->orderBy('starts')->whereIn('id', $ids)->get()->toJson();
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

        array_push($events_slim, $num_events);
        array_push($events_slim, $duration);
        return $events_slim;

        // return DB::table('events')->whereIn('id', $ids)->join('locations', 'events.location_id', '=', 'locations.location_id')->get()->toArray();

    }
}
