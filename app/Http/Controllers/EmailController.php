<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactYu;
use App\Mail\OrgRequest;
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

    public function orgRequest(Request $request)
    {
        $name = $request->name;
        $email = $request->email;

        Mail::to("contact@yourunity.org")->send(new OrgRequest($name, $email));

        return redirect('/');
    }


}
