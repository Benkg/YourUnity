<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;

class EventsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    public function create() {
        return view('events.create');
    }

    public function show(Event $event) {
        return view('events.show', compact('event'));
    }

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

        // Save to the database
        //$event->save();

        // Redirect
        return redirect('/events');

    }
}
