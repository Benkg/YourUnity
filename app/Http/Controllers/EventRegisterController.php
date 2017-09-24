<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ActivityRecord;
use App\Event;


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
        ActivityRecord::create([
            'event_id' => request('event_id'),
            'attendee_id' => request('attendee_id'),
            'check_in_time' => request('check_in_time'),
            'duration' => request('duration'),
            'activity_status' => request('activity_status')
        ]);
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

        $event_ids =  ActivityRecord::where('attendee_id', $user)->get();

        $ids = [];

        foreach($event_ids as $event) {
            array_push($ids, $event->event_id);
        }

        return Event::findMany($ids);

    }
}
