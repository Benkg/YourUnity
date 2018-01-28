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

                @if(isset($futureEvents[0]))
                    <?php echo '<br />
                        <div class="row">
                            <hr class="col-4"/><h3 class="text-center col-3">Future Events</h3><hr class="col-4"/>
                        </div>';
                    ?>
                    @foreach($futureEvents as $event)
                        <?php $location = $locations[$event->location_id-1]; ?>
                        @include('events.cards.event')
                    @endforeach
                @endif

                @if(isset($presentEvents[0]))
                    <?php echo '<br />
                        <div class="row">
                            <hr class="col-4"/><h3 class="text-center col-3">Current Events</h3><hr class="col-4"/>
                        </div>';
                    ?>
                    @foreach($presentEvents as $event)
                        <?php $location = $locations[$event->location_id-1]; ?>
                        @include('events.cards.event')
                    @endforeach
                @endif

                @if(isset($pastEvents[0]))
                    <?php echo '<br />
                        <div class="row">
                            <hr class="col-4"/><h3 class="text-center col-3">Past Events</h3><hr class="col-4"/>
                        </div>';
                    ?>
                    @foreach($pastEvents as $event)
                        <?php $location = $locations[$event->location_id-1]; ?>
                        @include('events.cards.event')
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
