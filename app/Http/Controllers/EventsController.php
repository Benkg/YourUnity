<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Event;
use Auth;

class EventsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /* VIEW ALL Events */
    public function index() {
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    /* VIEW SINGLE Event */
    public function show(Event $event) {
        $events = Event::latest()->get();
        return view('events.show', compact('events','event'));
    }

    /* CREATE Form */
    public function create() {
        return view('events.create');
    }

    /* EDIT Form */
    public function edit(Event $event) {
        return view('events.edit', compact('event'));
    }

    /* DUPLICATE Form */
    public function duplicate(Event $event) {
        return view('events.duplicate', compact('event'));
    }

    /* DELETE Form */
    public function getDelete(Event $event) {
        return view('events.delete', compact('event'));
    }

    /* CREATE/DUPLICATE an Event */
    public function store(Request $request) {

        /* Collect the date and time (start and end) input arrays */
        $startDate = $_POST['startDate'];
        //$endDate = $_POST['endDate'];
        //End date disabled untill we want to do multi-day events...
        $endDate = $startDate;
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $location = $_POST['location'];

        /* Concatenate the arrays and merge values into form request, just to check that every input was filled */
        $request->merge([
            'starting_date' => $startDate['year'] . $startDate['month'] . $startDate['day'],
            'ending_date' => $startDate['year'] . $startDate['month'] . $startDate['day'],
            'starting_time' => $startTime['hour'] . $startTime['minute'] . $startTime['period'],
            'ending_time' => $endTime['hour'] . $endTime['minute'] . $endTime['period'],
            'location' => $location['address'] .', '. $location['city'] . ', CA, ' . $location['zip'],
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

            'address' => $location['address'],
            'city' => $location['city'],
            'zip' => $location['zip'],
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

            'address' => 'required|min:4',
            'city' => 'required|min:4',
            'zip' => 'required|min:4',

            'event_name' => 'required|min:3|max:255',
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
        $thisEvents = Event::create([
            'event_name' => request('event_name'),
            'starts' => request('starts'),
            'ends' => request('ends'),
            'location' => request('location'),
            'event_description' => request('event_description'),
            'time_state' => 2,
            'user_id' => auth()->user()->id
        ]);

        /* Authorize, increment event#, save user */
        $user = Auth::user();
        $user->num_events = $user->num_events + 1;
        $user->save();

        //if($_POST['duplicate_id']){
        //    echo $_POST['duplicate_id'];
        //} For when we want to implement duplicate with attachments

        $id = $thisEvents->id;
        /* Redirect to event page */
        return redirect("/events/$id");

    }

    /* EDIT an Existing Event */
    public function patch(Request $request, Event $event) {

        /* Collect the date and time (start and end) input arrays */
        $startDate = $_POST['startDate'];
        //$endDate = $_POST['endDate'];
        //End date disabled untill we want to do multi-day events...
        $endDate = $startDate;
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $location = $_POST['location'];

        /* Concatenate the arrays and merge values into form request, just to check that every input was filled */
        $request->merge([
            'starting_date' => $startDate['year'] . $startDate['month'] . $startDate['day'],
            'ending_date' => $startDate['year'] . $startDate['month'] . $startDate['day'],
            'starting_time' => $startTime['hour'] . $startTime['minute'] . $startTime['period'],
            'ending_time' => $endTime['hour'] . $endTime['minute'] . $endTime['period'],
            'location' => $location['address'] .', '. $location['city'] . ', CA, ' . $location['zip'],
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

            'address' => $location['address'],
            'city' => $location['city'],
            'zip' => $location['zip'],
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

            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',

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
            user_id = :user_id
            where id = :id', [
                'id' => $id,
                'event_name' => request('event_name'),
                'starts' => request('starts'),
                'ends'=> request('ends'),
                'location' => request('location'),
                'event_description' => request('event_description'),
                'user_id' => auth()->user()->id
        ]);

        return redirect("/events/$id");
    }

    /* DELETE an Existing Event */
    public function delete(Event $event) {
        $id = $event->id;
        DB::delete('delete from event_attachments where event_id = ?', [$id]);
        DB::delete('delete from events where id = ?', [$id]);

        $user = Auth::user();
        $user->num_events = $user->num_events - 1;
        $user->save();

        return redirect("/");
    }

    public function test(Request $request){
        /* Collect the date and time (start and end) input arrays
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];

        Format Date/Time arrays into YYMMDDHHMMTZS format
        $starts = storeDTA($startDate, $startTime);

        timeUntil($starts);

        echo " until " . printDate($starts) . " " . printTime($starts);
        */
    }

}
