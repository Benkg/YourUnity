<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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

        // DB::update('update events set
        //     name = :name,
        //     where id = :id', [
        //         'name' => request('name'),
        // ]);

        $user->save();
        return view('settings.index', array('user' => Auth::user()));
    }
}
