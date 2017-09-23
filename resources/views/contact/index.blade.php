@extends('layouts.master')
@section('page_title')
Contact YourUnity
@endsection

@section('content')
@include('layouts.header')

<!-- Pass url to form submit, should be done using session reflash -->
<?php
    session()->flash('url', $url);
?>

<div id="contactContainer">
    @include('layouts.menu.contact')
    <div class="cont">
        <ul class="contactOptions">
            <li><a href="/contact/direct">Contact us Directly</a></li>
            <li><a href="/contact/feedback">Leave Feedback</a></li>
            <li><a href="/contact/report">Report an Issue</a></li>
        </ul>
    </div>
</div>

<style>
    .contactOptions {
        list-style-type: none;
        padding: 0;
        width: 100%;
        height: 100%;
    }

    .contactOptions > li > a {
        display: table-cell;
        text-decoration: none;
        text-decoration-color: white !important;
        font-size: 150%;
        vertical-align: middle;
    }

    .contactOptions > li {
        display: table;
        text-align: center;
        text-decoration: none;

        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        background-color: #2d2d2d;
        border-color: black;

        border-radius: 6px;
        width: 80vw;
        height: 20vh;
        margin: 5vh auto;
    }

</style>
@endsection
