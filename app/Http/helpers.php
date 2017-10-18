<?php

use Illuminate\Support\Facades\DB;
use App\Event;

/*================================= DATE AND TIME HELPERS =================================*/

// storeDTA();
if (! function_exists('storeDTA')) {
    function storeDTA($date, $time){

/* TIME ARRAY FORMATTING */
        /* Converts 12 hour time to 24 hour time */
        if( $time['period'] == "PM"){
            if( !(($time['hour']) == "12") ){
                $time['hour'] = ((int) $time['hour']) + 12;
            }
        } else if ( $time['hour'] == "12" ){
            $time['hour'] = ((int) $time['hour']) - 12;
        }

        /* Sets condition to format single hours "#" to "0#" (preserves HH format) */
        $addZero = 0;
        if($time['hour'] < 10){
            $addZero = 1;
        }

        /* Drops XM from array index, type casts string, drops spliced array */
        array_splice($time, 2);
        foreach ($time as $partial) {
            $time[] = (string) $partial;
        }
        array_splice($time, -2);

        /* Adds a "0" if condition is set */
        if($addZero){
            $time['hour'] = "0" . $time['hour'];
        }

        /* Implodes 24 hour array("##","##") to 24 hour string "####" */
        $time = implode("", $time);

/* DATE ARRAY FORMATTING */
        /* Concatenates date to "YYMMDD" string */
        $date = $date['year'] . $date['month'] . $date['day'];

/* COMBINING DATE AND TIME FOR STORAGE */
        /* Concatenates two strings into an integer Y Y M M D D H H M M  */
        $DTA = (int)($date . $time);

        $date = DateTime::createFromFormat('ymdHi', $DTA);

        $date = $date->format('Y-m-d H:i') . "\n";

        $date = strtotime($date);

        $date = toUTC($date);

        return $date;

    }
}

if(! function_exists('inDLS')) {
  function inDLS($secondsUTC){

      $DLSstart = [
        '17' => 1489312800,
        '18' => 1520762400,
        '19' => 1552212000,
        '20' => 1583661600,
      ];

      $DLSend = [
        '17' => 1509872400,
        '18' => 1541322000,
        '19' => 1572771600,
        '20' => 1604221200,
      ];

      $year = date("y", $secondsUTC);

      if( (abs($DLSend[$year]-$secondsUTC)) <= 25200){
          return 0;
      } else if( ($DLSstart[$year] <= $secondsUTC) && ($secondsUTC < $DLSend[$year] )){
          return 1;
      } else if( (abs($DLSstart[$year]-$secondsUTC)) <= 25200){
          return 1;
      } else {
          return 0;
      }

  }
}

// toUTC();
if (! function_exists('toUTC')) {
    function toUTC($secondsLocal) {

        //Hardcode adjustment for CA
        if(inDLS($secondsLocal)){
            $offset = 25200;
        } else {
            $offset = 28800;
        }

        //Correct for offset
        $secondsUTC = $secondsLocal + $offset;
        return $secondsUTC;
    }
}

// toLocalTime();
if (! function_exists('toLocalTime')) {
    function toLocalTime($secondsUTC) {

        //HardCode adjustment for CA
        if(inDLS($secondsUTC-25200)){
            $offset = 25200;
        } else {
            $offset = 28800;
        }

        $secondsLocal = $secondsUTC - $offset;
        return $secondsLocal;

    }
}

// timeUntil();
if (! function_exists('timeUntil')) {
    function timeUntil($futureSeconds){

        //get the current time
        $currentSeconds = time();

        //get the time differene in seconds
        $deltaSeconds = $futureSeconds - $currentSeconds;

        //return the result in a readable format
        return $deltaSeconds;

    }
}

// secsToTime();
if (! function_exists('secsToTime')) {
    function secsToTime($seconds) {
        if($seconds>=86400) { //If over 1 day, return # of days
            $time = floor($seconds / 86400);
            return $time . " Days";
        } else if($seconds>=3600){ //If over 1 hour, return # of hours
            $time = floor($seconds / 3600);
            return $time . " Hours";
        } else if($seconds>=0){ //If positive, return minutes
            $time = floor($seconds / 60 % 60);
            return $time . " Mins";
        } else { //If in the past, return 0
            return "0";
        }
    }
}

// secsToTimeShort();
if (! function_exists('secsToTimeShort')) {
    function secsToTimeShort($seconds) {

        if($seconds>=86400) { //If over 1 day, return # of days
            $time = floor($seconds / 86400);
            return $time . " d";
        } else if($seconds>=3600){ //If over 1 hour, return # of hours
            $time = floor($seconds / 3600);
            return $time . " h";
        } else if($seconds>=0){ //If positive, return minutes
            $time = floor($seconds / 60 % 60);
            return $time . " m";
        } else { //If in the past, return 0
            return "0";
        }
    }
}

// printDate();
if (! function_exists('printDate')) {
    function printDate($secondsUTC) {

        //Convert to seconds Local time
        $secondsLocal = toLocalTime($secondsUTC);

        //Format the date
        $localDate = date("F j, Y", $secondsLocal);

        //Return the formatted date
        return $localDate;

    }
}

// printTime();
if (! function_exists('printTime')) {
    function printTime($secondsUTC) {

        //Conver to seconds Local time
        $secondsLocal = toLocalTime($secondsUTC);

        //Format the time
        $localTime = date("g:i a", $secondsLocal);

        //Return the formatted time
        return $localTime;

    }
}

// parseTime();
if (! function_exists('parseTime')) {
    function parseTime($secondsUTC) {
        $secondsLocal = toLocalTime($secondsUTC);
        $arrTime = array(
          'year' => date("y", $secondsLocal),
          'month' => date("m", $secondsLocal),
          'day' => date("d", $secondsLocal),
          'hour' => date("g", $secondsLocal),
          'minute' => date("i", $secondsLocal),
          'period' => date("a", $secondsLocal)
        );
        return $arrTime;
    }
}

/*================================= TIME STATE HELPERS =================================*/

// updateTimeState();
if (! function_exists('updateTimeState')) {
    function updateTimeState($event) {
        //get current time
        $currentTime = time();

        //get event's time state, start time and end time

        $starts = $event->starts;
        $ends = $event->ends;
        $state = $event->time_state;

        //If in Future State and passed the start time, change the state to Present State
        if($state = 2 && $currentTime>$starts){
            setTimeState($event, 1);
        }

        //If in Present State and passed the end time, change the state to Past State
        if($state = 1 && $currentTime>$ends){
            setTimeState($event, 0);

            //count users volunteered for this event that is has passed;
            $event_id = $event->id;
            $people = App\ActivityRecord::where('event_id', $event_id)->get();

            foreach ($people as $person) {
                if($person->activity_status == 1) {
                    $person->activity_status = 0;

                    DB::table('events')->where('id', '=', $event_id)->increment('num_attended');
                    
                    // Get user id from event
                    $event = Event::where('id', $event_id)->first();
                    $user_id = $event->user_id;
                
                    // Update user table as well for number of people who attended their events
                    DB::table('users')->where('id', '=', $user_id)->increment('num_people_events');
                }

                $time_at_event = (($ends) - ($person->check_in_time));
                $person->duration = $time_at_event;
                $person->save();
            }



            /* Already doing this in the registration code */

            // $num_people = 0;

            // if(isset($people[0])){
            //   $num_people = count($people);
            // }

            /* Authorize, increment num_people_events, save user */
            // $user = Auth::user();
            // $user->num_people_events = $user->num_people_events + $num_people;
            // $user->save();
        }

    }
}

// setTimeState();
if (! function_exists('setTimeState')) {
    function setTimeState($event, $newState) {
        //get event's id, state, start time and end time
        $id = $event->id;

        //Update this event's time state
        DB::update('update events set
            time_state = :time_state
            where id = :id', [
                'id' => $id,
                'time_state' => $newState
        ]);
    }
}

// getTimeState();
if (! function_exists('getTimeState')) {
    function getTimeState(Event $event) {
        return $event->time_state;
    }
}

// htmlEventDropDown();
if (! function_exists('htmlEventDropDown')) {
    function htmlEventDropDown(Event $event) {

        switch(getTimeState($event)) {
            case 2:
                echo '<a href="/events/'.$event->id.'/edit" class="dropdown-item">Edit</a>
                <a href="/events/'.$event->id.'/duplicate" class="dropdown-item" href="#">Duplicate +</a>
                <a href="/attachments/'.$event->id.'" class="dropdown-item">Add Documents</a>
                <a href="/contact/feedback" class="dropdown-item">More Options</a>';
                break;
            case 1:

                break;
            case 0:
                echo '<a href="/events/'.$event->id.'/duplicate" class="dropdown-item" href="#">Duplicate +</a>
                <a href="/contact/feedback" class="dropdown-item">More Options</a>';
                break;
        }

    }
}



/*================================= GENERAL HELPERS =================================*/

// flashURL();
if (! function_exists('flashURL')) {
    function flashURL() {
        $currentUrl = $_SERVER['REQUEST_URI'];
        session()->flash('url', $currentUrl);
    }
}

// getNonPastEvents();
if (! function_exists('getNonPastEvents')) {
    function getNonPastEvents() {
        $userId = Auth::user()->id;
        $nonPastEvents = DB::table('events')->where('user_id', $userId)
                            ->where('time_state','!=', 0)
                            ->orderBy('starts', 'ASC')
                            ->get();
        return $nonPastEvents;
    }
}

/* randomNumber()
if (! function_exists('randomNumber')) {
    function randomNumber($length) {
        $result = '';

        for($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }

        return $result;
    }
}
*/


/*================================= FILE UPLOAD HELPERS =================================*/

// reArrayFiles();
if (! function_exists('reArrayFiles')) {
    function reArrayFiles() {

        //save uploaded files
        $attachments = $_FILES['attachments'];
        //count these files (for loop later)
        $file_count = count($attachments["name"]);
        //get the array keys of the $_FILES superglobal
        $file_keys = array_keys($attachments);
        //create a new array
        $re_ordered = array();

        //shuffle array so that each index is its own attachment
        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $re_ordered[$i][$key] = $attachments[$key][$i];
            }
        }

        return $re_ordered;
    }
}

// getInfo();
if (! function_exists('getInfo')) {
    function getInfo($attachment) {

        $fileName = $attachment['name'];
        $fileTmpName = $attachment['tmp_name'];
        $fileSize = $attachment['size'];
        $fileError = $attachment['error'];
        $fileType = $attachment['type'];

        $fileExt = explode ('.', $fileName);
        $fileLcaseExt = strtolower(end($fileExt));

        $fileInfo = [
            'name' => $fileName,
            'tmpName' => $fileTmpName,
            'size' => $fileSize,
            'type' => $fileType,
            'ext' => $fileLcaseExt,
            'error' => $fileError
        ];

        return $fileInfo;
    }
}
