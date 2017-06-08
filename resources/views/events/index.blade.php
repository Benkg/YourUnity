@extends('layouts.master')

@section('page_title')
All Events
@endsection

@section('content')
    @include('layouts.header')

<div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')
            <div class="col-9 pl-5 pr-5 pt-4">
                @foreach($events as $event)
                    @include('events.event')
                @endforeach
            </div>
        </div>
</div>
@endsection

<style>
    footer {
        position: relative !important;
    }
</style>
