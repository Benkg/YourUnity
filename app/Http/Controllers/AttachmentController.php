<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AttachmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Attachment;
use App\Event;

class AttachmentController extends Controller
{

    //This requires some elaboration.
    //The route to this function is ./attachments/{event_id}
    //When no attachments are available, it returns the manager
    //After the user submits the manager form, the store function reroutes->back();
    //Which means it reroutes back to the route ./attachments/{event_id}
    //However now, the user has attachments and so the attachment view is now returned
    //So the user can now upload and attach documents inline with no rerouting.
    public function attach(Event $event){
        //if no attachments reroute to manager
        $userId = Auth::user()->id;
        $attachments = DB::table('attachments')->where('user_id', '=', $userId)->get();
        $count = count($attachments);

        if(!$count){ //If the user has no attachments, reroute to manager
           return view('attachments.manager');
        } else { //Else return the attachment form
           return view('events.attach', compact('event'));
        }

    }

    public function manager(){
        return view('attachments.manager');
    }

    public function store(AttachmentRequest $request){

        $attIndex = 0;

        $fileInfo = reArrayFiles();

        foreach($fileInfo as $attachment){

            $attachment = getInfo($attachment);

            $userFileName = $attachment['name'];
            $ext = $attachment['ext'];
            $size = $attachment['size'];

            $file = $request->file('attachments')[$attIndex];
            //$uniqueFileName = Storage::putFile('attachments', $file);
            $uniqueFilePath = $file->store('public/storage/attachments');

            //$attachment = Storage::disk('attachments')->get('filename');

            Attachment::create([
                'unique_name' => $uniqueFilePath,
                'user_id' => auth()->user()->id,
                'type' => $ext,
                'name' => $userFileName,
                'size' => $size
            ]);

            $attIndex++;
        }

        return back();
    }

    public function delete(Request $request){
        $count = count($request->except('_token'));
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

            foreach($att_paths as $att_id){
                if(count($att_id)){
                    DB::delete('delete from event_attachments where attachment_id = ?', [$att_id]);
                    DB::delete('delete from attachments where unique_name = ?', [$att_id]);
                    Storage::delete($att_id);
                }
            }
        }
        //dd($request);
        return back();

    }
}
