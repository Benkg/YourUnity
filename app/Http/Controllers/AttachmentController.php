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
    public function uploadForm(Event $event){
        return view('attachments.uploadForm', compact('event'));
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

        for($i = 0; $i < $count; $i++){
            $att_id = $request[$i];
            DB::delete('delete from event_attachments where attachment_id = ?', [$att_id]);
            DB::delete('delete from attachments where unique_name = ?', [$att_id]);
            Storage::delete($att_id);
        }

        return back();

    }
}
