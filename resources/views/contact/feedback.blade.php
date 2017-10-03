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
            <h3 class="card-title">Help improve YourUnity</h3>
            <hr />
            <p class="card-text"> Leave feedback, warn of us bugs, or even offer suggestions for new features!</p>
            <hr />

            <!-- Feedback Form -->
            <form method="POST" action="/contact" class="col-10 col-centered">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" name="contact" rows="4" placeholder="Your feedback is greatly appreciated!"></textarea>
                </div>
                <input type="hidden" name="type" value='1' />
                <button type="submit" class="btn btn-primary text-white float-right">Send</button>
            <form>

        </div>
    </div>
</div>
@endsection
