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
}
