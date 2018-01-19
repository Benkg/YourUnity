@extends('layouts.master')
@section('page_title')
{{$org->company}} Test
@endsection

@section('content')
<div id="contactContainer">
    @include('layouts.menu.public') <!--TODO: Default CSS shouldn't be in here-->
    <div class="cont">
        <div class="cardContents">
            <h1 class="mt-2"> {{$org->company}} </h1>
        </div>

        <div class="cardContents">
            <div class="row pt-2">
                <div class = "col-6">
                    <a href="/{{ $org->company }}/events">
                        <span class="lnr lnr-layers"></span>
                        All Events
                    </a>
                </div>
                <div class = "col-6">
                    <a href="#">
                        <span class="lnr lnr-pencil"></span>
                        Sign-in
                    </a>
                </div>
            </div>
        </div>

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
