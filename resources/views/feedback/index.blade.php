@extends('layouts.master')
@section('page_title')
Delete Event
@endsection

@section('content')
@include('layouts.header')

                    <!-- Are you sure you want to delete this event? -->
<div class="card card-inverse text-center" style="margin: 2vh auto; width: 50vw; background-color: #333; border-color: #333;">
    <div class="card-block">

        <h3 class="card-title">Help improve YourUnity</h3>
        <p class="card-text"> Leave feedback, warn of us bugs, or offer suggestions!</p>
        <hr />

        <form method="POST" action="/feedback" class="col-10 col-centered">
          {{ csrf_field() }}
          <div class="form-group">
              <textarea class="form-control" id="feedback" name="feedback" rows="4"></textarea>
          </div>
          <button type="submit" class="btn btn-primary text-white float-right">Send</button>
        <form>
    </div>
</div>
@endsection
