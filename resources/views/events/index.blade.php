@extends('layouts.master')
@section('page_title')
All Events
@endsection

@section('content')

<!-- Main Content -->
<div class="container-fluid">
        <div class="row">

            <!-- SideBar -->
            @include('layouts.sidebar')

            <!-- Padding for fixed sidebar -->
            <div class="col-3"></div>

            <!-- Event Listing -->
            <div class="col-9 pl-5 pr-5 pt-4">
                <?php

                    $userId = Auth::user()->id;

                    //Select all this user's future events
                    $futureEvents = App\Event::where('user_id', $userId)
                                        ->where('time_state','=', 2)
                                        ->orderBy('starts', 'DESC')
                                        ->get();

                    //Select all this user's present events
                    $presentEvents = App\Event::where('user_id', $userId)
                                        ->where('time_state','=', 1)
                                        ->orderBy('starts', 'DESC')
                                        ->get();

                    //Select all this user's past events
                    $pastEvents = App\Event::where('user_id', $userId)
                                        ->where('time_state','=', 0)
                                        ->orderBy('starts', 'DESC')
                                        ->get();
                ?>
                @foreach($futureEvents as $event)
                    @if($event->user->id == Auth::user()->id)
                        @include('events.event')
                    @endif
                @endforeach

                <br /><hr /><br />

                @foreach($presentEvents as $event)
                    @if($event->user->id == Auth::user()->id)
                        @include('events.event')
                    @endif
                @endforeach

                @foreach($pastEvents as $event)
                    @if($event->user->id == Auth::user()->id)
                        @include('events.event')
                    @endif
                @endforeach

            </div>
        </div>
</div>

@endsection

<style>
    footer {
        position: relative !important;
    }
</style>
