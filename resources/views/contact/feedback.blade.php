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
            <form method="POST" action="/feedback" class="col-10 col-centered">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" name="fback" rows="4" placeholder="Your feedback is greatly appreciated!"></textarea>
                </div>
                <input type="hidden" name="type" value='1' />
                <button type="submit" class="btn btn-primary text-white float-right">Send</button>
            <form>

        </div>
    </div>
</div>

<style>

.cardContainer {
  padding: 0;
  width: 100%;
  height: 100%;
}

.cardContents {
  display: table;
  text-align: center;
  text-decoration: none;

  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
  background-color: #2d2d2d;
  border-color: black;

  border-radius: 6px;
  width: 80vw;
  margin: 5vh auto;
  padding-bottom: 2vh;
}

.cardContents > h3{
    margin: 2vh auto;
}

.cardContents > textarea{
    rows: 10;
}

</style>
@endsection
