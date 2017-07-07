@extends('layouts.master')
@section('page_title')
All Events
@endsection

@section('content')

<!-- Main Content -->
<div class="container-fluid">
        <div class="row">

            <!-- SideBar -->
            @include('layouts.sidebar')

            <!-- Padding for fixed sidebar -->
            <div class="col-3"></div>

            <!-- Event Listing -->
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
