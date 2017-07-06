@extends('layouts.master')
@section('page_title')
Edit Event
@endsection

@section('content')
@include('layouts.header')

<!-- Event Title, Errors Banner, and Edit Event Form -->
<div class="container">

    <!-- Errors Banner -->
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




    <!-- Edit Form -->
    <div class="row mt-3">
        <div class="col-8 col-centered">

            <h1 class="white">Edit Event</h1>
            <br />

            <form method="POST" action="/events/{{ $event->id }}/edit">
                {{ csrf_field() }}

                <div class="row">

                    <!-- Event Name -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="event_name">Event name</label>
                            <input type="text" class="form-control" id="event_name" aria-describedby="emailHelp" value="{{$event->event_name}}" name="event_name">
                        </div>
                    </div>

                    <!-- Event Location -->
                    <div class="col-6">
                        <div class="form-group">
                            <label for="location">Location of Event</label>
                            <input type="text" class="form-control" id="location" aria-describedby="locationHelp" value="{{$event->location}}" name="location">
                        </div>
                    </div>

                </div>

                <div class="row">

                    <!-- Event Date -->
                    <div class="col-4">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="text" class="form-control" id="date" value="{{$event->date}}" name="date">
                        </div>
                    </div>

                    <!-- Event Start Time -->
                    <div class="col-4">
                        <div class="form-group">
                            <label for="time_start">Start Time</label>

                            <select class="form-control" id="time_start" name="time_start">
                                <?php
                                $time = $event->time_start;
                                ?>
                                <option<?php if($time=='12:00 AM')echo ' selected="selected"';?>>12:00 AM</option>
                                <option<?php if($time=='1:00 AM')echo ' selected="selected"';?>>1:00 AM</option>
                                <option<?php if($time=='2:00 AM')echo ' selected="selected"';?>>2:00 AM</option>
                                <option<?php if($time=='3:00 AM')echo ' selected="selected"';?>>3:00 AM</option>
                                <option<?php if($time=='4:00 AM')echo ' selected="selected"';?>>4:00 AM</option>
                                <option<?php if($time=='5:00 AM')echo ' selected="selected"';?>>5:00 AM</option>
                                <option<?php if($time=='6:00 AM')echo ' selected="selected"';?>>6:00 AM</option>
                                <option<?php if($time=='7:00 AM')echo ' selected="selected"';?>>7:00 AM</option>
                                <option<?php if($time=='8:00 AM')echo ' selected="selected"';?>>8:00 AM</option>
                                <option<?php if($time=='9:00 AM')echo ' selected="selected"';?>>9:00 AM</option>
                                <option<?php if($time=='10:00 AM')echo ' selected="selected"';?>>10:00 AM</option>
                                <option<?php if($time=='11:00 AM')echo ' selected="selected"';?>>11:00 AM</option>
                                <option<?php if($time=='12:00 PM')echo ' selected="selected"';?>>12:00 PM</option>
                                <option<?php if($time=='1:00 PM')echo ' selected="selected"';?>>1:00 PM</option>
                                <option<?php if($time=='2:00 PM')echo ' selected="selected"';?>>2:00 PM</option>
                                <option<?php if($time=='3:00 PM')echo ' selected="selected"';?>>3:00 PM</option>
                                <option<?php if($time=='4:00 PM')echo ' selected="selected"';?>>4:00 PM</option>
                                <option<?php if($time=='5:00 PM')echo ' selected="selected"';?>>5:00 PM</option>
                                <option<?php if($time=='6:00 PM')echo ' selected="selected"';?>>6:00 PM</option>
                                <option<?php if($time=='7:00 PM')echo ' selected="selected"';?>>7:00 PM</option>
                                <option<?php if($time=='8:00 PM')echo ' selected="selected"';?>>8:00 PM</option>
                                <option<?php if($time=='9:00 PM')echo ' selected="selected"';?>>9:00 PM</option>
                                <option<?php if($time=='10:00 PM')echo ' selected="selected"';?>>10:00 PM</option>
                                <option<?php if($time=='11:00 PM')echo ' selected="selected"';?>>11:00 PM</option>
                            </select>
                        </div>
                    </div>

                    <!-- Event Start Time -->
                    <div class="col-4">
                        <div class="form-group">
                            <label for="time_start">End Time</label>

                            <select class="form-control" id="time_end" name="time_end">
                                <?php
                                    $time = $event->time_end;
                                ?>
                                <option<?php if($time=='12:00 AM')echo ' selected="selected"';?>>12:00 AM</option>
                                <option<?php if($time=='1:00 AM')echo ' selected="selected"';?>>1:00 AM</option>
                                <option<?php if($time=='2:00 AM')echo ' selected="selected"';?>>2:00 AM</option>
                                <option<?php if($time=='3:00 AM')echo ' selected="selected"';?>>3:00 AM</option>
                                <option<?php if($time=='4:00 AM')echo ' selected="selected"';?>>4:00 AM</option>
                                <option<?php if($time=='5:00 AM')echo ' selected="selected"';?>>5:00 AM</option>
                                <option<?php if($time=='6:00 AM')echo ' selected="selected"';?>>6:00 AM</option>
                                <option<?php if($time=='7:00 AM')echo ' selected="selected"';?>>7:00 AM</option>
                                <option<?php if($time=='8:00 AM')echo ' selected="selected"';?>>8:00 AM</option>
                                <option<?php if($time=='9:00 AM')echo ' selected="selected"';?>>9:00 AM</option>
                                <option<?php if($time=='10:00 AM')echo ' selected="selected"';?>>10:00 AM</option>
                                <option<?php if($time=='11:00 AM')echo ' selected="selected"';?>>11:00 AM</option>
                                <option<?php if($time=='12:00 PM')echo ' selected="selected"';?>>12:00 PM</option>
                                <option<?php if($time=='1:00 PM')echo ' selected="selected"';?>>1:00 PM</option>
                                <option<?php if($time=='2:00 PM')echo ' selected="selected"';?>>2:00 PM</option>
                                <option<?php if($time=='3:00 PM')echo ' selected="selected"';?>>3:00 PM</option>
                                <option<?php if($time=='4:00 PM')echo ' selected="selected"';?>>4:00 PM</option>
                                <option<?php if($time=='5:00 PM')echo ' selected="selected"';?>>5:00 PM</option>
                                <option<?php if($time=='6:00 PM')echo ' selected="selected"';?>>6:00 PM</option>
                                <option<?php if($time=='7:00 PM')echo ' selected="selected"';?>>7:00 PM</option>
                                <option<?php if($time=='8:00 PM')echo ' selected="selected"';?>>8:00 PM</option>
                                <option<?php if($time=='9:00 PM')echo ' selected="selected"';?>>9:00 PM</option>
                                <option<?php if($time=='10:00 PM')echo ' selected="selected"';?>>10:00 PM</option>
                                <option<?php if($time=='11:00 PM')echo ' selected="selected"';?>>11:00 PM</option>
                            </select>
                        </div>
                    </div>

                </div>

                <!-- Event Description -->
                <div class="form-group">
                    <label for="event_description">Description</label>
                    <textarea class="form-control text-left" id="event_description" name="event_description" rows="3"><?php echo "$event->event_description"; ?></textarea>
                </div>

                <!-- Event Requirements Input -->
                <div class="form-group">
                    <label for="event_description">Requirements</label>
                    <textarea class="form-control" id="event_requirements" name="event_requirements" rows="3"><?php echo "$event->event_requirements"; ?></textarea>
                </div>

                <!-- Cancle Submit and Delete Buttons -->
                <a href="/events/{{ $event->id }}">Cancel</a>
                <button type="submit" class="btn btn-primary float-right ml-3">Submit</button>
                <a href="/events/{{ $event->id }}/delete" class="text-white btn btn-danger float-right">Delete</a>

            </form>
        </div>
    </div>

</div>

                    <!-- Script for Date Format -->
    <script>
        $(document).ready(function(){
          var date_input=$('input[name="date"]'); //our date input has the name "date"
          var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
          var options={
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
          };
          date_input.datepicker(options);
      });
    </script>

@endsection

                    <!-- Custom Styles -->
<style>
body {
  background: #3f3f3f !important;
  font-weight: 200;
}

label {
    color: #fff;
}

.col-centered {
    margin: 0 auto;
}

.white {
    color: #fff;
}

.black-background {
    background: #2e2e2e; /* Old Browsers */
background: -webkit-linear-gradient(top,#2e2e2e,#3f3f3f); /*Safari 5.1-6*/
background: -o-linear-gradient(top,#2e2e2e,#3f3f3f); /*Opera 11.1-12*/
background: -moz-linear-gradient(top,#2e2e2e,#3f3f3f); /*Fx 3.6-15*/
background: linear-gradient(to bottom, #2e2e2e, #3f3f3f); /*Standard*/
}

.logo {
  width: 10em;
}

.event {
    background: #2e2e2e;
    border: 0px;
    opacity: 0.7;
    color: #fff;
    width: 100%;
    border-radius: 5px;
}

.btn-primary {
    background-color: #6bbaa7 !important;
    border: 1px solid #6bbaa7 !important;
}

button:hover {
    cursor: pointer;
}
</style>
