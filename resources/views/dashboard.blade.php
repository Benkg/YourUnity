@extends('layouts.master')

@section('page_title')
Dashboard @endsection

@section('content')
@include('layouts.header')

<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-9 pl-5 pr-5 pt-4 dashboard">
            <div class="row">
                @include('cards.stats')

                <div class="col-12">
                    <br />
                    <br />
                    <br />
                <center><h2>{{ Auth::user()->company }}'s Events &#8226; <a href="/events" class="no-highlight">All Events</a></h2></center>
                <hr />
                @foreach($events as $event)
                    @if($event->user->id == Auth::user()->id)
                        @include('events.event')
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
