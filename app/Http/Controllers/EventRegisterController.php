<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Mail\EventRegistration;
use Illuminate\Http\Request;
use App\ActivityRecord;
use App\Attendees;
use App\Event;
use Mail;


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
    {   //Are we checking to make sure that the user cannot register for an active or past event?
        ActivityRecord::create([ //not sure if this is allowed
            'event_id' => request('event_id'),
            'attendee_id' => request('firedb_id'),
            'check_in_time' => request('check_in_time'),
            'duration' => request('duration'),
            'activity_status' => request('activity_status')
        ]);

        $attendee = App\Attendees::where('firedb_id','=', $request['firedb_id'])->get();

        //might have to use column index but names should work.
        $attendee_name = $attendee['name'];
        $attendee_email = $attendee['email'];

        //get only future event with this id, returns null if not future state....
        $event_id = $request['event_id'];
        $event = App\Event::where('time_state','=', 2)->where('event_id', $event_id)->get();

        //Send email to this user. Passes user info and event info
        Mail::to($attendee_email)->send(new EventRegistration($attendee_name, $event));

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

        DB::update('update activity_records set
            check_in_time = :check_in_time,
            duration = :duration,
            activity_status = :activity_status
            where attendee_id = :attendee_id and event_id = :event_id', [
                'attendee_id' => $attendee_id,
                'event_id' => $event_id,
                'check_in_time' => request('check_in_time'),
                'duration' => request('duration'),
                'activity_status'=> request('activity_status')
        ]);
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

        $event_ids =  ActivityRecord::where([
            ['attendee_id', '=', $user],
            ['activity_status', '>', 0]
            ])->get();

        $ids = [];

        foreach($event_ids as $event) {
            array_push($ids, $event->event_id);
        }

        return Event::findMany($ids);

    }
}
