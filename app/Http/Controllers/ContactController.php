<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\contact;
use Auth;

class ContactController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /*Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
     public function index() {
        $url = session('url');
        return view('contact.index', compact('url'));
     }

     public function feedback() {
        $url = session('url');
        return view('contact.feedback', compact('url'));
     }

     public function eventOptions() {
        $url = session('url');
        return view('contact.eventOptions', compact('url'));
     }

     public function direct() {
        $url = session('url');
        return view('contact.direct', compact('url'));
     }

     public function report() {
        $url = session('url');
        return view('contact.report', compact('url'));
     }

    /* Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                              // Validate form before submit
              $this->validate(request(), [
                  'contact' => 'required|min:5'
              ]);

              // Create new contact data
              contact::create([
                  'contact' => request('contact'),
                  'user_id' => auth()->user()->id,
                  'type' => request('type')
              ]);

              return redirect('/');
    }

}
