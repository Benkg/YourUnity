@extends('layouts.master')
@section('page_title')
Dashboard
@endsection

@section('content')

<?php
    $nonPastEvents = getNonPastEvents();
    $numEvents = sizeof($nonPastEvents);
?>
                    <!-- Header (top bar with logo and settings) -->
<div class="container-fluid">
    <div class="row">

                    <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Padding for fixed sidebar -->
        <div class="col-3"></div>

                    <!-- Stats Bar and Events List -->
        <div class="col-9 pl-5 pr-5 pt-4 dashboard">
            <div class="row mt-4">

                <!-- Stats Bar -->
                @include('cards.stats')

            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h3 class="thicc">Upcoming Events</h3>

                    <br />

                    @if($numEvents == 0)
                        <h4 class="italic">You have no upcoming events.</h4>
                    @endif
                </div>
            </div>

            <div class="row">
                <!-- start a count var -->
                <?php $count = 1; ?>

                @foreach($nonPastEvents as $event)
                    @if($event->time_state == 2)

                    <div class="col-4 mt-4">

                    <a href="/events/{{ $event->id }}" class="white">
                        <div class="card small-event">
                            <div class="card-header card-inverse center" style="background-color: #6bbaa7; color: #fff !important;">
                                    <h5>{{ $event->event_name }}</h5>
                            </div>

                            <div class="card-block">
                                <span>
                                    <span class="lnr lnr-calendar-full"></span> <?php echo printDate($event->starts) ?>
                                    (<?php
                                        $time = timeUntil($event->starts);
                                        echo secsToTimeShort($time);
                                    ?>)
                                </span>
                                <br />
                                <span><span class="lnr lnr-clock"></span> <?php echo printTime($event->starts) ?> - <?php echo printTime($event->ends) ?></span>
                                <br />
                                <span>
                                    @if($event->num_registered == 1)
                                        {{ $event->num_registered }} person has registered
                                    @endif

                                    @if($event->num_registered > 1)
                                        {{ $event->num_registered }} people have registered
                                    @endif
                                </span>
                            </div>
                        </div>
                    </a>

                    </div>

                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
