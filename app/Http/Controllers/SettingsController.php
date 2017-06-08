<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
use Image;

class SettingsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $events = Event::latest()->get();
        return view('settings.index', array('user' => Auth::user()));
    }

    public function store(Request $request) {
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('/images/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('settings.index', array('user' => Auth::user()));
    }
}
