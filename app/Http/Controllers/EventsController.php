<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Event;
use Auth;

class EventsController extends Controller
{
                    /*  */
    public function __construct() {
        $this->middleware('auth');
    }

                    /* View All Events */
    public function index() {
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

                    /* Create an Event */
    public function create() {
        return view('events.create');
    }

                    /* View Single Event */
    public function show(Event $event) {
        $events = Event::latest()->get();
        return view('events.show', compact('events','event'));
    }

                    /* View Edit Form */
    public function edit(Event $event) {
        return view('events.edit', compact('event'));
    }

                    /* View Delete From */
    public function getDelete(Event $event) {
        return view('events.delete', compact('event'));
    }

                    /* Store a Newly Created Event */
    public function store(Request $request) {

                        // Validate form before submit
        $this->validate(request(), [
            'event_name' => 'required|min:3|max:255',
            'date' => 'required',
            'time_start' => 'required',
            'duration' => 'required|integer|digits_between:0,23',
            'location' => 'required|min:4|max:255',
            'event_description' => 'required|min:5'
        ]);

                        // Create new event using request data
        Event::create([
            'event_name' => request('event_name'),
            'date' => request('date'),
            'time_start' => request('time_start'),
            'duration' => request('duration'),
            'location' => request('location'),
            'event_description' => request('event_description'),
            'recurring' => request('recurring'),
            'user_id' => auth()->user()->id
        ]);

        $user = Auth::user();
        $user->num_events = $user->num_events + 1;
        $user->save();

                        //Save to the database
                        //$event->save();

                        // Redirect
        return redirect('/events');

    }

                    /* Edit an Existing Event */
    public function patch(Request $request, Event $event) {

                        // Validate form before submit
        $this->validate(request(), [
            'event_name' => 'required|min:3|max:255',
            'date' => 'required',
            'time_start' => 'required',
            'duration' => 'required|integer|digits_between:0,23',
            'location' => 'required|min:4|max:255',
            'event_description' => 'required|min:5'
        ]);

        $id = $event->id;

        DB::update('update events set
            event_name = :event_name,
            date = :date,
            time_start = :time_start,
            duration = :duration,
            location = :location,
            event_description = :event_description,
            recurring = :recurring,
            user_id = :user_id
            where id = :id', [
                'id' => $id,
                'event_name' => request('event_name'),
                'date' => request('date'),
                'time_start' => request('time_start'),
                'duration' => request('duration'),
                'location' => request('location'),
                'event_description' => request('event_description'),
                'recurring' => request('recurring'),
                'user_id' => auth()->user()->id
        ]);

        return redirect('/');
    }

                    /* Delete an Existing Event */
    public function delete(Event $event) {
        $id = $event->id;
        DB::delete('delete from events where id = ?', [$id]);

        $user = Auth::user();
        $user->num_events = $user->num_events - 1;
        $user->save();

        return redirect('/');
    }

}
