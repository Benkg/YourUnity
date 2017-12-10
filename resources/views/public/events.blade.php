@extends('layouts.master')
@section('page_title')
Test
@endsection

@section('content')
<div id="contactContainer">
    @include('layouts.menu.public')
    <div class="cont">
        <div class="orgTitle">
            <a href="/{{ $org->company }}">
                <h1 class="mt-2"> {{$org->company}} </h1>
            </a>
        </div>

        @foreach($events as $event)
            @include('public.cards.mEventShort')
        @endforeach
    </div>
</div>

@endsection

<style>
.buttons {
    background-color: transparent !important;
    color: #6bbaa7 !important;
    border: 2px solid #6bbaa7 !important; /* Green */
}

</style>

<!--
<div class="container-fluid">
    <div class="row">

        <h1 class="org">{{ $org->company }}</h1>
        <div class="eventCard"></div>
        <div class="signInForm"></div>

    </div>
</div>
-->
