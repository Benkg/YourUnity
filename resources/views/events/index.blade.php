@extends('layouts.master')
@section('page_title')
All Events
@endsection

@section('content')
<?php
    $nonPastEvents = getNonPastEvents();
?>

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

                @if(isset($futureEvents[0]))
                    <?php echo '<br /><hr /><br />
                    <h3 class="text center">Future Events</h3>'?>
                    @foreach($futureEvents as $event)
                        @if($event->user->id == Auth::user()->id)
                            @include('events.event')
                        @endif
                    @endforeach
                @endif

                @if(isset($presentEvents[0]))
                    <?php echo '<br /><hr /><br />
                    <h3 class="text center">Current Events</h3>'?>
                    @foreach($presentEvents as $event)
                        @if($event->user->id == Auth::user()->id)
                            @include('events.event')
                        @endif
                    @endforeach
                @endif

                @if(isset($pastEvents[0]))
                    <?php echo '<br /><hr /><br />
                    <h3 class="text center">Past Events</h3>'?>
                    @foreach($pastEvents as $event)
                        @if($event->user->id == Auth::user()->id)
                            @include('events.event')
                        @endif
                    @endforeach
                @endif

            </div>
        </div>
</div>

@endsection

<style>
    footer {
        position: relative !important;
    }
</style>
