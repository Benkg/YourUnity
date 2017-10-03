@extends('layouts.master')
@section('page_title')
Direct Contact | YourUnity
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
        <div class="cardContents">

            <!-- Directions -->
            <h3 class="card-title">Report an Issue</h3>
            <p class="card-text">Please report and and all issues. We take your welfare seriously and want to help you resolve any problems or concerns.</p>
            <hr />

            <!-- Report Form -->
            <form method="POST" action="/contact" class="col-10 col-centered">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" name="contact" rows="4" placeholder="We will respond as soon as possible"></textarea>
                </div>
                <input type="hidden" name="type" value='2' />
                <button type="submit" class="btn btn-primary text-white float-right">Send</button>
            <form>

        </div>
    </div>
</div>
@endsection
