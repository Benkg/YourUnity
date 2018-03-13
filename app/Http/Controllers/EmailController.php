<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactYu;
use Illuminate\Mail\Mailable;
use Mail;



class EmailController extends Controller
{
    
    public function contact(Request $request)
    {   
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;
        
        Mail::to("contact@yourunity.org")->send(new ContactYu($name, $email, $message));

        return redirect('/');
    }

   
}
