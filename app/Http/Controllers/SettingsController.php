<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Event;
use Auth;
use Image;

class SettingsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

                    /* Displays Settings Page */
    public function index() {
        $events = Event::latest()->get();
        return view('settings.index', array('user' => Auth::user()));
    }

    public function edit() {
        return view('settings.edit', array('user' => Auth::user()));
    }
                    /* Saves New Profile Picture to User */
    public function store(Request $request) {

        $user = Auth::user();

        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->fit(400,400)->save(public_path('/images/avatars/' . $filename));
            $user->avatar = $filename;
        }

        $id = $user->id;

        $user->save();
        return view('settings.index', array('user' => Auth::user()));
    }



    public function update()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'fname'       => 'required|string|max:255',
            'lname'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('settings/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $user = Auth::user();
            $user->name_first = request('fname');
            $user->name_last = request('lname');
            
            //We need to send a verification email to ensure the correct email.
            $user->email = request('email');
            $user->save();

            // redirect
            return Redirect::to('/settings');
        }
    }
}
