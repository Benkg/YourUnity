<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Event;
use Auth;

class DownloadsController extends Controller
{

    public function event(Request $request, Event $event) {
        //Select the all records from this event
        $eventId = $event->id;
        $records = DB::table('activity_records')
        ->where('event_id', '=', $eventId)
        ->where('duration', '>', 0)
        ->select('event_id', 'attendee_id', 'check_in_time', 'duration')
        ->get();

        if(count($records)>0){
            $CsvData = array('event_name,event_date,attendee_name,check_in_time,duration');
            foreach($records as $value){
                $attendeeName = DB::table('attendees')
                ->where('firedb_id', '=', $value->attendee_id)
                ->select('name_first','name_last')
                ->get();
                $attendeeName = $attendeeName[0]->name_first.' '.$attendeeName[0]->name_last;

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

            $headers = ['Content-Type' => 'application/csv'];
            $filename="volunteers".date('Y-m-d').".csv";
            $file_path=base_path().'/csv'.'/'.$filename;

            $file = fopen($file_path,"w+");

            foreach ($CsvData as $exp_data){
              fputcsv($file,explode(',',$exp_data));
            }
            fclose($file);

            return response()->download($file_path,$filename,$headers);
        }
    }

    public function all(Request $request) {
        $user_id = Auth::user()->id;
        $records = DB::table('activity_records')
        ->where('user_id', '=', $user_id)
        ->where('duration', '>', 0)
        ->select('event_id', 'attendee_id', 'check_in_time', 'duration')
        ->get();

        if(count($records)>0){
            $CsvData = array('event_name,event_date,attendee_name,check_in_time,duration');
            foreach($records as $value){
                $attendeeName = DB::table('attendees')
                ->where('firedb_id', '=', $value->attendee_id)
                ->select('name_first','name_last')
                ->get();
                $attendeeName = $attendeeName[0]->name_first.' '.$attendeeName[0]->name_last;

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

            $headers = ['Content-Type' => 'application/csv'];
            $filename="volunteers".date('Y-m-d').".csv";
            $file_path=base_path().'/csv'.'/'.$filename;

            $file = fopen($file_path,"w+");

            foreach ($CsvData as $exp_data){
              fputcsv($file,explode(',',$exp_data));
            }
            fclose($file);

            return response()->download($file_path,$filename,$headers);
        } else {
           return back();
        }
    }
}
