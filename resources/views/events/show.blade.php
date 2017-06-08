@extends('layouts.master')

@section('page_title')
{{ $event->event_name }}
@endsection

@section('content')
<!--
<div class="event">
    <h3>{{ $event->event_name }}</h3>
    <p>Created By: {{ $event->user->name }}</p>
    <p>{{ $event->date }}</p>
    <p>{{ $event->time_start }}</p>
    <p>{{ $event->duration }} hours</p>
    <p>{{ $event->location }}</p>
    <p>{{ $event->event_description }}</p>
    <p>{{ $event->recurring }}</p>
</div>
-->
@include('layouts.header')

<div class="full-content">

<div class="container-fluid">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 pl-5 pr-5 pt-4">
            <div class="row">
                <div class="event mb-4 p-3">
                    <h3>{{ $event->event_name }}</h3>
                    <p>Created By: {{ $event->user->name }}</p>
                    <p>{{ $event->date }}</p>
                    <p>{{ $event->time_start }}</p>
                    <p>{{ $event->duration }} hours</p>
                    <p>{{ $event->location }}</p>
                    <p>{{ $event->event_description }}</p>
                    <p>{{ $event->recurring }}</p>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
@endsection

<style>
body {
  background: #3f3f3f !important;
  font-weight: 200;
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
