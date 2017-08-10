<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Feedback;
use Auth;

class FeedbackController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /*Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
     public function index() {
        $url = session('url');
        return view('feedback.index', compact('url'));
     }

     public function eventOptions() {
        $url = session('url');
        return view('feedback.eventOptions', compact('url'));
     }

    /* Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                              // Validate form before submit
              $this->validate(request(), [
                  'fback' => 'required|min:5'
              ]);

                              // Create new feedback data
              Feedback::create([
                  'fback' => request('fback'),
                  'user_id' => auth()->user()->id
              ]);

              $previousUrl = session('url');
              return redirect($previousUrl);
    }

}
