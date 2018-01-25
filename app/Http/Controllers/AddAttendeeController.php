<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendee;
use Illuminate\Support\Facades\DB;

class AddAttendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Attendee::create([
            'firedb_id' => request('firedb_id'),
            'avatar' => request('avatar'),
            'email' => request('email'),
        ]);

        DB::update('update attendees set
            name_first = :name_first,
            name_last = :name_last
            where firedb_id = :firedb_id', [
                'firedb_id' => request('firedb_id'),
                'name_first' => request('name_first'),
                'name_last' => request('name_last')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $firedb_id)
    {
        DB::update('update attendees set
            name_first = :name_first,
            name_last = :name_last,
            avatar = :avatar,
            email = :email
            where firedb_id = :firedb_id', [
                'firedb_id' => $firedb_id,
                'name_first' => request('name_first'),
                'name_last' => request('name_last'),
                'avatar' => request('avatar'),
                'email' => request('email')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
