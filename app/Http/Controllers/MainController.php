<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AuthenticatesUsers;

class MainController extends Controller
{
    protected $redirectTo = '/register';
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
    public function register($access) {
        if($access == "true") {
            return view('auth.registration');
        }
        else {
            return view('auth.access');
        }
    }

                    /* Returns Access Code Page */
    public function access() {
        return view('auth.access');
    }

                    /* Hardcoded Access Code. However, people can still just visit /register without fail */
    public function granted (Request $request) {
        if($request->code == "myunity") {
            return view('auth.registration', ['access' => 'true']);
        }
        else {
            return redirect('/access');
        }
    }


}
