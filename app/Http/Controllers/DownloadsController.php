<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Event;

class DownloadsController extends Controller
{
    public function event(Request $request, Event $event) {

        $eventId = $event->id;
        $records = DB::table('activity_records')
        ->where('event_id', '=', $eventId)
        ->select('event_id', 'attendee_id', 'check_in_time', 'duration')
        ->get();

        if(count($records)>0){


            $CsvData = array('name,date,attendee,check_in_time,duration');
            foreach($records as $value){
                $attendeeName = DB::table('attendees')
                ->where('firedb_id', '=', $value->attendee_id)
                ->select('name')
                ->get();
                $attendeeName = $attendeeName[0]->name;

                $event = DB::table('events')
                ->where('id', '=', $value->event_id)
                ->select('event_name','starts')
                ->get();
                $event = $event[0];
                $eventName = $event->event_name;
                $eventDate = printDateFS($event->starts);

                $check_in_time = printTime($value->check_in_time);

                $CsvData[]=$eventName.','.$eventDate.','.$attendeeName.','.$check_in_time.','.$value->duration;
            }

            $filename="volunteers".date('Y-m-d').".csv";
            $file_path=base_path().'/'.$filename;
            $file = fopen($file_path,"w+");

            foreach ($CsvData as $exp_data){
              fputcsv($file,explode(',',$exp_data));
            }
            fclose($file);

            $headers = ['Content-Type' => 'application/csv'];
            return response()->download($file_path,$filename,$headers );
        }
        return back();


    }

    public function all(Request $request) {

        $eventId = $event->id;
        $records = DB::table('activity_records')
        ->where('event_id', '=', $eventId)
        ->select('event_id', 'attendee_id', 'check_in_time', 'duration')
        ->get();


// Algorithmic effeceincy of obtaining all event IDs then rerunning the script with each ID
// Or to add user Id to avtivity records so that we can qeury the whole result in one go.

        if(count($records)>0){


            $CsvData = array('name,date,attendee,check_in_time,duration');
            foreach($records as $value){
                $attendeeName = DB::table('attendees')
                ->where('firedb_id', '=', $value->attendee_id)
                ->select('name')
                ->get();
                $attendeeName = $attendeeName[0]->name;

                $event = DB::table('events')
                ->where('id', '=', $value->event_id)
                ->select('event_name','starts')
                ->get();
                $event = $event[0];
                $eventName = $event->event_name;
                $eventDate = printDateFS($event->starts);

                $check_in_time = printTime($value->check_in_time);

                $CsvData[]=$eventName.','.$eventDate.','.$attendeeName.','.$check_in_time.','.$value->duration;
            }

            $filename="volunteers".date('Y-m-d').".csv";
            $file_path=base_path().'/'.$filename;
            $file = fopen($file_path,"w+");

            foreach ($CsvData as $exp_data){
              fputcsv($file,explode(',',$exp_data));
            }
            fclose($file);

            $headers = ['Content-Type' => 'application/csv'];
            return response()->download($file_path,$filename,$headers );
        }
        return back();
    }
}
