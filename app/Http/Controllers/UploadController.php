<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadForm(){
        return view('attachments.uploadForm');
    }

    public function uploadSubmit(Request $request){
        /* Validate form before submit */
        $this->validate(request(), [
            'file_name' => 'required',
            'type' => 'max:2000',
            'size' => ,
            'user_id' =>
        ]);
    }
}
