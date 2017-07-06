@extends('layouts.master')
@section('page_title')
Delete Event
@endsection

@section('content')
@include('layouts.header')

                    <!-- Are you sure you want to delete this event? -->
<div class="card card-inverse text-center " style="margin: 2vh auto; width: 50vw; background-color: #333; border-color: #333;">
    <div class="card-block">
        <h3 class="card-title">Are you sure you want to delete this event?</h3>
        <p class="card-text">Deleting an event is permanent. Click no to return to previous page.</p>
        <hr />
        <form method="POST" action="/events/{{ $event->id }}/delete">
          {{ csrf_field() }}
          <button type="submit" class="btn btn-primary text-white">Yes</button>
          <a href="/events/{{ $event->id }}/edit" class="btn btn-primary text-white">No</a>
        <form>
    </div>
</div>

@endsection

                    <!-- Custom Styles -->
<style>
body {
  background: #3f3f3f !important;
  font-weight: 200;
}

label {
    color: #fff;
}

.white {
    color: #fff;
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

.event {
    background: #2e2e2e;
    border: 0px;
    opacity: 0.7;
    color: #fff;
    width: 100%;
    border-radius: 5px;
}

.btn-primary {
    background-color: #6bbaa7 !important;
    border: 1px solid #6bbaa7 !important;
}

button:hover {
    cursor: pointer;
}
</style>
