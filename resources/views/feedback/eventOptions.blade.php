@extends('layouts.master')
@section('page_title')
Feedback
@endsection

@section('content')
@include('layouts.header')

<!-- Pass url to form submit, should be done using session reflash -->
<?php
    session()->flash('url', $url);
?>

<div class="card card-inverse text-center" style="margin: 2vh auto; width: 50vw; background-color: #333; border-color: #333;">
    <div class="card-block">

      <!-- Errors Banner
        <div class="row">
            <div class="col-8">
                @if(count($errors))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
        -->

        <!-- Directions -->
        <h3 class="card-title">Want to see more event options?</h3>
        <p class="card-text"> Leave some feedback and tell us what you would like to see!</p>
        <hr />

        <!-- Feedback Form -->
        <form method="POST" action="/feedback" class="col-10 col-centered">
          {{ csrf_field() }}
          <div class="form-group">
              <textarea class="form-control" name="fback" rows="4" placeholder="Your feedback is greatly appreciated!"></textarea>
          </div>
          <button type="submit" class="btn btn-primary text-white float-right">Send</button>
        <form>

    </div>
</div>
@endsection
