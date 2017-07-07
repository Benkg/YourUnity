<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Event;
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
         return view('feedback.index');
     }

    /* Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

}
