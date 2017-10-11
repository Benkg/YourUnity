<?php

use Illuminate\Support\Facades\DB;
use App\Event;





/*================================= DATE AND TIME HELPERS =================================*/

/*         storeDTA();
/***************************************************************************************************/
/* Converts date array("Mo","Da","Ye") and time array("##","##","XM")to int YeMoDaHoMiTzS 24 hour time*/
/***************************************************************************************************/
if (! function_exists('storeDTA')) {
    function storeDTA($date, $time){

/* TIME FORMATTING */
        /* Computation for 24 hour time */
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

        /* Implodes array("##","##") to string "####" */
        $time = implode("", $time);

        /* HARD CODE FOR PACIFIC TIMEZONE */
        // $time = $time . "001";

/* DATE FORMATTING */
        /* Concatenates date to "YYMMDD" */
        $date = $date['year'] . $date['month'] . $date['day'];

/* COMBINING DATE AND TIME FOR STORAGE */
        $DTA = (int)($date . $time);

        $date = DateTime::createFromFormat('ymdHi',$DTA);

        $date = $date->format('Y-m-d H:i') . "\n";

        $date = strtotime($date);

        $date = toUTC($date);

        return $date;

    }
}

/*         toUTC();
/**********************************************/
/* Converts from seconds Local to seconds UTC */
/**********************************************/
if (! function_exists('toUTC')) {
    function toUTC($secondsLocal) {

        //Second adjustment for San Diego
        $secondsUTC = $secondsLocal + 25200;
        return $secondsUTC;

    }
}

/*         toLocalTime();
/**********************************************/
/* Converts from seconds UTC to seconds Local */
/**********************************************/
if (! function_exists('toLocalTime')) {
    function toLocalTime($secondsUTC) {

        //Second adjustment for San Diego
        $secondsLocal = $secondsUTC - 25200;
        return $secondsLocal;

    }
}

/*         timeUntil();
/*********************************/
/* Returns days until a DTA time */
/*********************************/
if (! function_exists('timeUntil')) {
    function timeUntil($futureDate){

        //get the current time
        $currentDate = time();

        //get the time differene in seconds
        $deltaSeconds = $futureDate - $currentDate;

        //return the result in a readable format
        return secsToTime($deltaSeconds);

    }
}

/*         secsToTime();
/*******************************************/
/* Converts seconds into a readable format */
/*******************************************/
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

/*         printDate();
/***************************************/
/* Prints the date of some seconds UTC */
/***************************************/
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

/*         printTime();
/***************************************/
/* Prints the date of some seconds UTC */
/***************************************/
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

/*         parseTime();
/******************************************************************************/
/* Parses time in seconds to an array(Year, Month, Day, Hour, Minute, Period) */
/******************************************************************************/
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

/*         updateTimeState();
/**************************************/
/* Updates the time state of an event */
/**************************************/
if (! function_exists('updateTimeState')) {
    function updateTimeState(Event $event) {

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
            $people = App\ActivityRecord::where('event_id', $event_id);

            $num_people = 0;

            if(isset($people[0])){
              $num_people = count($people);
            }

            /* Authorize, increment num_people_events, save user */
            $user = Auth::user();
            $user->num_people_events = $user->num_people_events + $num_people;
            $user->save();
        }

    }
}

/*         setTimeState();
/***********************************/
/* Sets the time state of an event */
/***********************************/
if (! function_exists('setTimeState')) {
    function setTimeState(Event $event, $newState) {

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

/*         getTimeState();
/**************************************/
/* Returns the time state of an event */
/**************************************/
if (! function_exists('getTimeState')) {
    function getTimeState(Event $event) {
        return $event->time_state;
    }
}

/*         htmlEventDropDown();
/**************************************/
/* Returns the time state of an event */
/**************************************/
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

/*         flashURL();
/******************************************/
/* Flash Current URL to next http request */
/******************************************/
if (! function_exists('flashURL')) {
    function flashURL() {
        $currentUrl = $_SERVER['REQUEST_URI'];
        session()->flash('url', $currentUrl);
    }
}

/******************************************/
/* Flash Current URL to next http request */
/******************************************/
if (! function_exists('randomNumber')) {
    function randomNumber($length) {
        $result = '';

        for($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }

        return $result;
    }
}


/*================================= FILE UPLOAD HELPERS =================================*/

/*         testUpload();
/******************************************/
/* Flash Current URL to next http request */
/******************************************/
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

/*         reArrayFiles();
/******************************************/
/* Flash Current URL to next http request */
/******************************************/
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
