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


                // Are there events? Used for styling page
                $future = false;
                $present = false;
                $past = false;

                $userId = Auth::user()->id;

                //Select all this user's future events
                $futureEvents = App\Event::where('user_id', $userId)
                                    ->where('time_state','=', 2)
                                    ->orderBy('starts', 'DESC')
                                    ->get();

                if($futureEvents != null) {
                    $future = true;
                }

                //Select all this user's present events
                $presentEvents = App\Event::where('user_id', $userId)
                                    ->where('time_state','=', 1)
                                    ->orderBy('starts', 'DESC')
                                    ->get();

                if($presentEvents != null) {
                    $present = true;
                }

                //Select all this user's past events
                $pastEvents = App\Event::where('user_id', $userId)
                                    ->where('time_state','=', 0)
                                    ->orderBy('starts', 'DESC')
                                    ->get();

                if($pastEvents != null) {
                    $past = true;
                }
            ?>

            @if(isset($futureEvents[0]))
                <?php echo '<br /><h2 class="text center bold">Future Events</h2>'?>
                @foreach($futureEvents as $event)
                    @if($event->user->id == Auth::user()->id)
                        @include('events.event')
                    @endif
                @endforeach
            @endif

            @if(isset($presentEvents[0]))
                <?php 
                if(!$future) {
                    echo '<h2 class="text center bold">Current Events</h2>';
                }
                else {
                    echo '<br /><h2 class="text center bold">Current Events</h2>
                    <hr />';
                }
                ?>
                @foreach($presentEvents as $event)
                    @if($event->user->id == Auth::user()->id)
                        @include('events.event')
                    @endif
                @endforeach
            @endif

            @if(isset($pastEvents[0]))
                <?php
                if(!$future && !$present) {
                    echo '<h2 class="text center bold">Past Events</h2>';
                }
                else {
                    echo '<br /><h2 class="text center bold">Past Events</h2>
                    <hr />';
                }
                ?>
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

    .bold {
        font-weight: 300 !important;
    }

    hr {
        margin-bottom: 2.5rem !important;
    }
</style>
