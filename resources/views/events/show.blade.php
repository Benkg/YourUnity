@extends('layouts.master')
@section('page_title')
{{ $event->event_name }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            @include('layouts.sidebar')

            @include('events.format.top')

            @include('events.cards.buttons')
            @include('events.cards.event')
            @if ( $event->time_state == 2)
                @include('events.cards.registeredList')
            @elseif ( $event->time_state == 1)
                @include('events.cards.attendingList')
            @else
                @include('events.cards.attendedList')
            @endif

            @include('events.format.bottom')

        </div>
    </div>
@endsection

<style>
    body {
        background: #3f3f3f !important;
        font-weight: 200;
    }

    footer {
        position: relative !important;
    }

    .black-background {
        background: #2e2e2e; /* Old Browsers */
        background: -webkit-linear-gradient(top,#2e2e2e,#3f3f3f); /*Safari 5.1-6*/
        background: -o-linear-gradient(top,#2e2e2e,#3f3f3f); /*Opera 11.1-12*/
        background: -moz-linear-gradient(top,#2e2e2e,#3f3f3f); /*Fx 3.6-15*/
        background: linear-gradient(to bottom, #2e2e2e, #3f3f3f); /*Standard*/
    }

    .logo {
        width: 10em;
    }
</style>
