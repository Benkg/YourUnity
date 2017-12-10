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
        @include('public.cards.buttons')
        @include('public.cards.mEventLong')

    </div>
</div>

@endsection
