@extends('layouts.master')
@section('page_title')
All Events
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('layouts.sidebar')

            @include('events.format.top')

            @include('events.cards.mainButtons')

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
                    <?php echo '<br />
                        <div class="row">
                            <hr class="col-4"/><h3 class="text-center col-3">Future Events</h3><hr class="col-4"/>
                        </div>';
                    ?>
                    @foreach($futureEvents as $event)
                        @if($event->user->id == Auth::user()->id)
                            @include('events.cards.event')
                        @endif
                    @endforeach
                @endif

                @if(isset($presentEvents[0]))
                    <?php echo '<br />
                        <div class="row">
                            <hr class="col-4"/><h3 class="text-center col-3">Current Events</h3><hr class="col-4"/>
                        </div>';
                    ?>
                    @foreach($presentEvents as $event)
                        @if($event->user->id == Auth::user()->id)
                            @include('events.cards.event')
                        @endif
                    @endforeach
                @endif

                @if(isset($pastEvents[0]))
                    <?php echo '<br />
                        <div class="row">
                            <hr class="col-4"/><h3 class="text-center col-3">Past Events</h3><hr class="col-4"/>
                        </div>';
                    ?>
                    @foreach($pastEvents as $event)
                        @if($event->user->id == Auth::user()->id)
                            @include('events.cards.event')
                        @endif
                    @endforeach
                @endif

            @include('events.format.bottom')

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
