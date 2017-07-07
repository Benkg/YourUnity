<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
                    /*  */
    public function __construct() {
        $this->middleware('guest');
    }
                    /* Returns Index Page (Landing Page) */
    public function index() {
      return view('index');
    }

                    /* Returns Login Page*/
    public function login() {
        return view('auth.login');
    }

                    /* Returns Registration Page */
    public function register() {
        return view('auth.register');
    }

                    /* Returns Access Code Page */
    public function access() {
        return view('auth.access');
    }

                    /* Hardcoded Access Code. However, people can still just visit /register without fail */
    public function granted (Request $request) {
        if($request->code == "myunity")
            return redirect('/register');
        else
            return redirect('/access');
    }


}
