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
            Image::make($avatar)->save(public_path('/images/avatars/' . $filename));
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
            'name'       => 'required|string|max:255',
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
            $user->name = request('name');
            $user->email = request('email');
            $user->save();

            // redirect
            return Redirect::to('/settings');
        }
    }
}
