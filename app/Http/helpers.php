<?php

/*=================================Date And Time Helpers

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
/*********************************/
/* Returns days until a DTA time */
/*********************************/
if (! function_exists('toUTC')) {
    function toUTC($secondsLocal) {
        $secondsUTC = $secondsLocal + 25200;
        return $secondsUTC;
    }
}

/*         toLocalTime();
/*********************************/
/* Returns days until a DTA time */
/*********************************/
if (! function_exists('toLocalTime')) {
    function toLocalTime($secondsUTC) {
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
        $currentDate = time();
        $deltaSeconds = $futureDate - $currentDate;
        return secsToTime($deltaSeconds);
    }
}

/*         secsToTime();
/*********************************/
/* Returns days until a DTA time */
/*********************************/
if (! function_exists('secsToTime')) {
    function secsToTime($seconds) {
        /* if less than a day, else */

        if($seconds>=86400) {
            $time = floor($seconds / 86400);
            return $time . " Days";
        } else if($seconds>=3600){
            $time = floor($seconds / 3600);
            return $time . " Hours";
        } else if($seconds>=0){
            $time = floor($seconds / 60 % 60);
            return $time . " Mins";
        } else {
            return "0";
        }
    }
}

/*         printDate();
/*********************************/
/* Returns days until a DTA time */
/*********************************/
if (! function_exists('printDate')) {
    function printDate($secondsUTC) {
        $secondsLocal = toLocalTime($secondsUTC);
        $localDate = date("F j, Y", $secondsLocal);
        return $localDate;
    }
}

/*         printTime();
/*********************************/
/* Returns days until a DTA time */
/*********************************/
if (! function_exists('printTime')) {
    function printTime($secondsUTC) {
        $secondsLocal = toLocalTime($secondsUTC);
        $localTime = date("g:i a", $secondsLocal);
        return $localTime;
    }
}

/*         parseTime();
/*********************************/
/* Returns days until a DTA time */
/*********************************/
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

/*=================================General Helpers

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
