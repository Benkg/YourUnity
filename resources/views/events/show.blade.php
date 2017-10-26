@extends('layouts.master')
@section('page_title')
{{ $event->event_name }}
@endsection

@section('content')
<?php
    $nonPastEvents = getNonPastEvents();
?>

<!-- Event Card -->
<div class="container-fluid">
    <div class="row">

        <!-- SideBar -->
        @include('layouts.sidebar')

        <!-- Padding for fixed sidebar -->
        <div class="col-3"></div>

        <!-- Event Listing -->
        <div class="col-9 pl-5 pr-5 pt-4">
            @include('events.event')
            @include('cards.attendeeList')
        </div>

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
