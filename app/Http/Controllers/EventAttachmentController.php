<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventAttachment;
use Illuminate\Support\Facades\DB;

class EventAttachmentController extends Controller
{
    public function store(Request $request){
        //Code for multiple checkbox code
        //count all selected attachments
        $count = count($request->except('_token','submit','event_id'));

        //If there are attachments
        if($count){
            $att_paths = array();
            $i = 0;
            $j = 0;

            //loop through them (Double index because request comes with indexes like [0,2,11,13,24] and we want them like [0,1,2..])
            while($i<$count){
                $path_index = (string)$j;
                $path = $request->input($path_index);

                //if not null
                if($path){
                  $att_paths[$i] = $path;
                  $i++;
                }
                $j++;
            }
        }

        $event_id = (int)request('event_id');
        foreach($att_paths as $att_id){
            EventAttachment::create([
                'attachment_id' => $att_id,
                'event_id' => $event_id
            ]);
        }

        return redirect("/events/$event_id");
    }

    public function remove(Request $request){
      //count all selected attachments
      $count = count($request->except('_token','submit','event_id'));

      //If there are attachments
      if($count){
          $att_paths = array();
          $i = 0;
          $j = 0;

          //loop through them (Double index because request comes with indexes like [0,2,11,13,24] and we want them like [0,1,2..])
          while($i<$count){
              $path_index = (string)$j;
              $path = $request->input($path_index);

              //if not null
              if($path){
                $att_paths[$i] = $path;
                $i++;
              }
              $j++;
          }
      }

      foreach($att_paths as $att_id){
        DB::delete('delete from event_attachments where attachment_id = ?', [$att_id]);
      }

      return back();
    }


    public function update(Request $request){

      //count all selected attachments
      $count = count($request->except('_token', 'event_id', 'old_event_atts'));

      //Gets all checked attachments and puts them into an array
      if($count){
          $att_paths = array();
          $i = 0;
          $j = 0;

          //loop through them (Double index because request comes with indexes like [0,2,11,13,24] and we want them like [0,1,2..])
          while($i<$count){
              $path_index = (string)$j;
              $path = $request->input($path_index);

              //if not null
              if($path){
                $att_paths[$i] = $path;
                $i++;
              }
              $j++;
          }
      }

      $event_id = (int)request('event_id');
      $old_event_atts = request('old_event_atts');

      if(count($old_event_atts)){
          foreach($old_event_atts as $old_atts){
              DB::delete("delete from event_attachments where attachment_id = '$old_atts' and event_id = '$event_id'");
          }
      }

      if($count){
          foreach($att_paths as $att_id){
              EventAttachment::create([
                  'attachment_id' => $att_id,
                  'event_id' => $event_id
              ]);
          }
      }

      return redirect("/events/$event_id");
    }
}
