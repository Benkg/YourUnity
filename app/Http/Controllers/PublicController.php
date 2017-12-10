<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Event;
use App\User;

class PublicController extends Controller
{
    /* VIEW ALL Events */
    public function index(string $organization) {
        $org = DB::table('users')->where('company', '=', $organization)->get();
        $org = $org[0];
        return view('public.organization', compact('org'));
    }

    /* VIEW SINGLE Event */
    public function events(string $organization) {
        $org = DB::table('users')->where('company', '=', $organization)->get();
        $org = $org[0];
        $org_id = $org->id;
        $events = Event::where('user_id', '=', $org_id)->orderBy('starts', 'DESC')->get();
        return view('public.events', compact('org','events'));
    }

    /* VIEW SINGLE Event */
    public function event(string $organization, Event $event) {
        $org = DB::table('users')->where('company', '=', $organization)->get();
        $org = $org[0];
        return view('public.event', compact('org','event'));
    }

    /* CREATE Form */
    public function signinform(string $organization, Event $event) {
      $org = DB::table('users')->where('company', '=', $organization)->get();
      $org = $org[0];
      return view('public.signin', compact('org'));
    }

    public function signin(string $organization, Event $event) {
      $org = DB::table('users')->where('company', '=', $organization)->get();
      $org = $org[0];
        return view('public.signindone');
    }

}
