<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Location;
use App\Event;
use Auth;

class EventsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /* VIEW ALL Events */
    public function index() {
        $user_id = Auth::user()->id;

        //Select all this user's future events
        $futureEvents = DB::table('events')
                            ->where('user_id', $user_id)
                            ->where('time_state','=', 2)
                            ->orderBy('starts', 'DESC')
                            ->get();

        //Select all this user's present events
        $presentEvents = DB::table('events')
                            ->where('user_id', $user_id)
                            ->where('time_state','=', 1)
                            ->orderBy('starts', 'DESC')
                            ->get();

        //Select all this user's past events
        $pastEvents = DB::table('events')
                            ->where('user_id', $user_id)
                            ->where('time_state','=', 0)
                            ->orderBy('starts', 'DESC')
                            ->get();

        $locations = DB::table('locations')
                      ->where('user_id', '=', $user_id)
                      ->get();

        return view('events.index', compact('futureEvents','presentEvents','pastEvents','locations'));
    }

    /* VIEW SINGLE Event */
    public function show(Event $event) {
        $user_id = auth()->user()->id;
        $location_id = $event->location_id;
        $location = DB::table('locations')
                ->where('location_id', '=', $location_id)
                ->where('user_id', '=', $user_id)
                ->get();
        $location = $location[0];

        return view('events.show', compact('event','location'));
    }

    /* CREATE Form */
    public function create() {
        return view('events.create');
    }

    /* EDIT Form */
    public function edit(Event $event) {
        $user_id = auth()->user()->id;
        $location_id = $event->location_id;
        $location = DB::table('locations')
                ->where('location_id', '=', $location_id)
                ->where('user_id', '=', $user_id)
                ->get();
        $location = $location[0];

        return view('events.edit', compact('event', 'location'));
    }

    /* DUPLICATE Form */
    public function duplicate(Event $event) {
        $user_id = auth()->user()->id;
        $location_id = $event->location_id;
        $location = DB::table('locations')
                ->where('location_id', '=', $location_id)
                ->where('user_id', '=', $user_id)
                ->get();
        $location = $location[0];

        return view('events.duplicate', compact('event', 'location'));
    }

    /* DELETE Form */
    public function getDelete(Event $event) {
        return view('events.delete', compact('event'));
    }

    /* CREATE/DUPLICATE an Event */
    public function store(Request $request) {
        /*/ Structure Of Request
         * startDate[] = {month, day, year}
         * startTime[] = {hour, minute, period}
         * endTime[] = {hour, minute, period}
         * location[] = {address, city, state, zip, country, latitude, longitude}
         * event_description
         * event_name
        /*/

        //$endDate = $_POST['endDate'];
        //End date disabled untill we want to do multi-day events...
        $startDate = $_POST['startDate'];
        $endDate = $startDate;
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $location = $_POST['location'];

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
            'event_description' => 'required|min:5',
            'event_type' => 'required'
        ]);

        $user_id = auth()->user()->id;

        /*/ Clarifying Location variables
         * $location -> the location from the request
         * $locations -> all of this users stored locations
         * $loc -> a specific stored location
        /*/

        //Get all of this users stored address
        $locations = DB::table('locations')->where('user_id', $user_id)->get();

        //Assume a new address (set flag and create the next id)
        $newAddress = 1;
        $location_id = count($locations) + 1;

        //Loop through all address and check for a match
        foreach ($locations as $loc) {
          //If a match is found, clear flag and change id to that one
           if($location['address'] == $loc->address){
              $newAddress = 0;
              $location_id = $loc->location_id;
           }
        }

        //If we have a new address, add it to the database
        if($newAddress){
          $thisLocation = Location::create([
              'user_id' => $user_id,
              'location_id' => $location_id,
              'address' => $location['address'],
              'city' => $location['city'],
              'state' => $location['state'],
              'country' => $location['country'],
              'postal_code' => $location['zip'],
              'latitude' => $location['latitude'],
              'longitude' => $location['longitude'],
          ]);
        }


        /* Format Date/Time arrays into YYMMDDHHMMTZS format */
        $starts = storeDTA($startDate, $startTime);
        $ends = storeDTA($endDate, $endTime);
        $request->merge([
            'starts' => $starts,
            'ends' => $ends,
        ]);

        /* Create new event using request data */
        $thisEvent = Event::create([
            'event_name' => request('event_name'),
            'location_id' => $location_id,
            'type_id' => request('event_type'),
            'starts' => request('starts'),
            'ends' => request('ends'),
            'event_description' => request('event_description'),
            'time_state' => 2,
            'company' => auth()->user()->company,
            'user_id' => auth()->user()->id
        ]);

        /* Authorize, increment event#, save user */
        $user = Auth::user();
        $user->num_events = $user->num_events + 1;
        $user->save();

        /* Redirect to event page */
        $id = $thisEvent->id;
        return redirect("/events/$id");

    }

    /* EDIT an Existing Event */
    public function patch(Request $request, Event $event) {
        /*/ Structure Of Request
         * startDate[] = {month, day, year}
         * startTime[] = {hour, minute, period}
         * endTime[] = {hour, minute, period}
         * location[] = {address, city, state, zip, country, latitude, longitude}
         * event_description
         * event_name
        /*/

        //$endDate = $_POST['endDate'];
        //End date disabled untill we want to do multi-day events...
        $startDate = $_POST['startDate'];
        $endDate = $startDate;
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $location = $_POST['location'];

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
            'event_description' => 'required|min:5',
            'event_type' => 'required'
        ]);

        $user_id = auth()->user()->id;

        /*/ Clarifying Location variables
         * $location -> the location from the request
         * $locations -> all of this users stored locations
         * $loc -> a specific stored location
        /*/

        //Get all of this users stored address
        $locations = DB::table('locations')->where('user_id', $user_id)->get();

        //Assume a new address (set flag and create the next id)
        $newAddress = 1;
        $location_id = count($locations) + 1;

        //Loop through all address and check for a match
        foreach ($locations as $loc) {
          //If a match is found, clear flag and change id to that one
           if($location['address'] == $loc->address){
              $newAddress = 0;
              $location_id = $loc->location_id;
           }
        }

        //If we have a new address, add it to the database
        if($newAddress){
          $thisLocation = Location::create([
              'user_id' => $user_id,
              'location_id' => $location_id,
              'address' => $location['address'],
              'city' => $location['city'],
              'state' => $location['state'],
              'country' => $location['country'],
              'postal_code' => $location['zip'],
              'latitude' => $location['latitude'],
              'longitude' => $location['longitude'],
          ]);
        }


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
            location_id = :location_id,
            event_description = :event_description,
            type_id = :type_id,
            company = :company,
            user_id = :user_id
            where id = :id', [
                'id' => $id,
                'event_name' => request('event_name'),
                'starts' => request('starts'),
                'ends'=> request('ends'),
                'location_id' => $location_id,
                'event_description' => request('event_description'),
                'type_id' => request('event_type'),
                'company' => auth()->user()->company,
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
}
