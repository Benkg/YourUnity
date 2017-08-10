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

    public function duplicate(Event $event) {
        return view('events.duplicate', compact('event'));
    }

                    /* View Delete From */
    public function getDelete(Event $event) {
        return view('events.delete', compact('event'));
    }

    /* Store a Newly Created Event */
    public function store(Request $request) {

        /* Collect the date and time (start and end) input arrays */
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];

        /* Concatenate the arrays and merge values into form request, just to check that every input was filled */
        $request->merge([
            'starting_date' => $startDate['year'] . $startDate['month'] . $startDate['day'],
            'ending_date' => $startDate['year'] . $startDate['month'] . $startDate['day'],
            'starting_time' => $startTime['hour'] . $startTime['minute'] . $startTime['period'],
            'ending_time' => $endTime['hour'] . $endTime['minute'] . $endTime['period'],
        ]);

        $request->merge([
            'starting_year' => $startDate['year'],
            'starting_month' => $startDate['month'],
            'starting_day' => $startDate['day'],

            'ending_year' => $endDate['year'],
            'ending_month' => $endDate['month'],
            'ending_day' => $endDate['day'],

            'starting_hour' => $startTime['hour'],
            'starting_minute' => $startTime['minute'],
            'starting_period' => $startTime['period'],

            'ending_hour' => $endTime['hour'],
            'ending_minute' => $endTime['minute'],
            'ending_period' => $endTime['period'],
        ]);

        /* Validate form before submit */
        $this->validate(request(), [
            'starting_year' => 'required',
            'starting_month' => 'required',
            'starting_day' => 'required',

            'ending_year' => 'required',
            'ending_month' => 'required',
            'ending_day' => 'required',

            'starting_hour' => 'required',
            'starting_minute' => 'required',
            'starting_period' => 'required',

            'ending_hour' => 'required',
            'ending_minute' => 'required',
            'ending_period' => 'required',

            'event_name' => 'required|min:3|max:255',
            'location' => 'required|min:4|max:255',
            'event_description' => 'required|min:5'
        ]);

        /* Format Date/Time arrays into YYMMDDHHMMTZS format */
        $starts = storeDTA($startDate, $startTime);
        $ends = storeDTA($endDate, $endTime);

        $request->merge([
            'starts' => $starts,
            'ends' => $ends,
        ]);

        /* Create new event using request data */
        Event::create([
            'event_name' => request('event_name'),
            'starts' => request('starts'),
            'ends' => request('ends'),
            'location' => request('location'),
            'event_description' => request('event_description'),
            'event_requirements' => request('event_requirements'),
            'user_id' => auth()->user()->id
        ]);

        /* Authorize, increment event#, save user */
        $user = Auth::user();
        $user->num_events = $user->num_events + 1;
        $user->save();

        /* Redirect to event page */
        return redirect('/events');

    }

                    /* Edit an Existing Event */
    public function patch(Request $request, Event $event) {

        /* Collect the date and time (start and end) input arrays */
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];

        /* Concatenate the arrays and merge values into form request, just to check that every input was filled */
        $request->merge([
            'starting_date' => $startDate['year'] . $startDate['month'] . $startDate['day'],
            'ending_date' => $startDate['year'] . $startDate['month'] . $startDate['day'],
            'starting_time' => $startTime['hour'] . $startTime['minute'] . $startTime['period'],
            'ending_time' => $endTime['hour'] . $endTime['minute'] . $endTime['period'],
        ]);

        $request->merge([
            'starting_year' => $startDate['year'],
            'starting_month' => $startDate['month'],
            'starting_day' => $startDate['day'],

            'ending_year' => $endDate['year'],
            'ending_month' => $endDate['month'],
            'ending_day' => $endDate['day'],

            'starting_hour' => $startTime['hour'],
            'starting_minute' => $startTime['minute'],
            'starting_period' => $startTime['period'],

            'ending_hour' => $endTime['hour'],
            'ending_minute' => $endTime['minute'],
            'ending_period' => $endTime['period'],
        ]);

        /* Validate form before submit */
        $this->validate(request(), [
            'starting_year' => 'required',
            'starting_month' => 'required',
            'starting_day' => 'required',

            'ending_year' => 'required',
            'ending_month' => 'required',
            'ending_day' => 'required',

            'starting_hour' => 'required',
            'starting_minute' => 'required',
            'starting_period' => 'required',

            'ending_hour' => 'required',
            'ending_minute' => 'required',
            'ending_period' => 'required',

            'event_name' => 'required|min:3|max:255',
            'location' => 'required|min:4|max:255',
            'event_description' => 'required|min:5'
        ]);

        /* Format Date/Time arrays into YYMMDDHHMMTZS format */
        $starts = storeDTA($startDate, $startTime);
        $ends = storeDTA($endDate, $endTime);

        $request->merge([
            'starts' => $starts,
            'ends' => $ends,
        ]);

        $id = $event->id;

        DB::update('update events set
            event_name = :event_name,
            starts = :starts,
            ends = :ends,
            location = :location,
            event_description = :event_description,
            event_requirements = :event_requirements,
            user_id = :user_id
            where id = :id', [
                'id' => $id,
                'event_name' => request('event_name'),
                'starts' => request('starts'),
                'ends'=> request('ends'),
                'location' => request('location'),
                'event_description' => request('event_description'),
                'event_requirements' => request('event_requirements'),
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

    public function test(Request $request){
        /* Collect the date and time (start and end) input arrays */
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];

        /* Format Date/Time arrays into YYMMDDHHMMTZS format */
        $starts = storeDTA($startDate, $startTime);

        timeUntil($starts);

        echo " until " . printDate($starts) . " " . printTime($starts);
    }

}
