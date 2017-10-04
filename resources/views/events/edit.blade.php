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

    <?php
        $starts = $event->starts;
        $ends = $event->ends;
        $starting = parseTime($starts);
        $ending = parseTime($ends);
        $location = explode(", ", $event->location);

        $address = $location[0];
        $city = $location[1];
        $state = $location[2];
        $zip = $location[3];

        $startyear = $starting['year'];
        $startmonth = $starting['month'];
        $startday = $starting['day'];
        $starthour = $starting['hour'];
        $startminute = $starting['minute'];
        $startperiod = $starting['period'];

        $endyear = $ending['year'];
        $endmonth = $ending['month'];
        $endday = $ending['day'];
        $endhour = $ending['hour'];
        $endminute = $ending['minute'];
        $endperiod = $ending['period'];
    ?>


    <!-- Edit Form -->
    <div class="row mt-3">
        <div class="col-8 col-centered">

            <h1 class="white">Create Event</h1>
            <br />

            <form method="POST" action="/events/{{ $event->id }}/edit">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-6">
                        <!-- Event Name -->
                        <div class="form-group">
                            <label for="event_name">Event name</label>
                            <input type="text" class="form-control" id="event_name" aria-describedby="emailHelp" value="{{$event->event_name}}" name="event_name">
                        </div>

                        <!-- Event Location -->
                        <div class="form-group">
                            <label for="location">Location of Event</label>
                            <div id=location>
                                <input type="text" class="form-control mb-2" id="location[address]" aria-describedby="locationHelp" <?php echo 'value="'.$address.'"'; ?> name="location[address]">
                                <input type="text" class="form-control mb-2" id="location[city]" aria-describedby="locationHelp" <?php echo 'value="'.$city.'"'; ?> name="location[city]">
                                <input type="text" class="form-control" id="location[zip]" aria-describedby="locationHelp" <?php echo 'value="'.$zip.'"'; ?> name="location[zip]">
                            </div>

                        </div>
                    </div>

                    <div class="col-6">
                        <!-- Start Date Picker -->
                        <div class="form-group">
                            <label for="date_start">Starts On:</label>
                            <div class="row pl-3" id="date_start">

                                <select class="form-control col-5 mr-2" id="startDate[month]" name="startDate[month]">
                                    <option value=""></option>
                                    <option value="01" <?php if($startmonth=='01')echo ' selected="selected"';?>>January</option>
                                    <option value="02" <?php if($startmonth=='02')echo ' selected="selected"';?>>Febuary</option>
                                    <option value="03" <?php if($startmonth=='03')echo ' selected="selected"';?>>March</option>
                                    <option value="04" <?php if($startmonth=='04')echo ' selected="selected"';?>>April</option>
                                    <option value="05" <?php if($startmonth=='05')echo ' selected="selected"';?>>May</option>
                                    <option value="06" <?php if($startmonth=='06')echo ' selected="selected"';?>>June</option>
                                    <option value="07" <?php if($startmonth=='07')echo ' selected="selected"';?>>July</option>
                                    <option value="08" <?php if($startmonth=='08')echo ' selected="selected"';?>>August</option>
                                    <option value="09" <?php if($startmonth=='09')echo ' selected="selected"';?>>September</option>
                                    <option value="10" <?php if($startmonth=='10')echo ' selected="selected"';?>>October</option>
                                    <option value="11" <?php if($startmonth=='11')echo ' selected="selected"';?>>November</option>
                                    <option value="12" <?php if($startmonth=='12')echo ' selected="selected"';?>>December</option>
                                </select>

                                <select class="form-control col-3 mr-2" id="startDate[day]" name="startDate[day]">
                                    <option value=""></option>
                                    <option value="01" <?php if($startday=='01')echo ' selected="selected"';?>>1</option>
                                    <option value="02" <?php if($startday=='02')echo ' selected="selected"';?>>2</option>
                                    <option value="03" <?php if($startday=='03')echo ' selected="selected"';?>>3</option>
                                    <option value="04" <?php if($startday=='04')echo ' selected="selected"';?>>4</option>
                                    <option value="05" <?php if($startday=='05')echo ' selected="selected"';?>>5</option>
                                    <option value="06" <?php if($startday=='06')echo ' selected="selected"';?>>6</option>
                                    <option value="07" <?php if($startday=='07')echo ' selected="selected"';?>>7</option>
                                    <option value="08" <?php if($startday=='08')echo ' selected="selected"';?>>8</option>
                                    <option value="09" <?php if($startday=='09')echo ' selected="selected"';?>>9</option>
                                    <option <?php if($startday=='10')echo ' selected="selected"';?>>10</option>
                                    <option <?php if($startday=='11')echo ' selected="selected"';?>>11</option>
                                    <option <?php if($startday=='12')echo ' selected="selected"';?>>12</option>
                                    <option <?php if($startday=='13')echo ' selected="selected"';?>>13</option>
                                    <option <?php if($startday=='14')echo ' selected="selected"';?>>14</option>
                                    <option <?php if($startday=='15')echo ' selected="selected"';?>>15</option>
                                    <option <?php if($startday=='16')echo ' selected="selected"';?>>16</option>
                                    <option <?php if($startday=='17')echo ' selected="selected"';?>>17</option>
                                    <option <?php if($startday=='18')echo ' selected="selected"';?>>18</option>
                                    <option <?php if($startday=='19')echo ' selected="selected"';?>>19</option>
                                    <option <?php if($startday=='20')echo ' selected="selected"';?>>20</option>
                                    <option <?php if($startday=='21')echo ' selected="selected"';?>>21</option>
                                    <option <?php if($startday=='22')echo ' selected="selected"';?>>22</option>
                                    <option <?php if($startday=='23')echo ' selected="selected"';?>>23</option>
                                    <option <?php if($startday=='24')echo ' selected="selected"';?>>24</option>
                                    <option <?php if($startday=='25')echo ' selected="selected"';?>>25</option>
                                    <option <?php if($startday=='26')echo ' selected="selected"';?>>26</option>
                                    <option <?php if($startday=='27')echo ' selected="selected"';?>>27</option>
                                    <option <?php if($startday=='28')echo ' selected="selected"';?>>28</option>
                                    <option <?php if($startday=='29')echo ' selected="selected"';?>>29</option>
                                    <option <?php if($startday=='30')echo ' selected="selected"';?>>30</option>
                                    <option <?php if($startday=='31')echo ' selected="selected"';?>>31</option>
                                </select>

                                <select class="form-control col-3" id="startDate[year]" name="startDate[year]">
                                    <option value=""></option>
                                    <option value="17" <?php if($startyear=='17')echo ' selected="selected"';?>>2017</option>
                                    <option value="18" <?php if($startyear=='18')echo ' selected="selected"';?>>2018</option>
                                    <option value="19" <?php if($startyear=='19')echo ' selected="selected"';?>>2019</option>
                                    <option value="20" <?php if($startyear=='20')echo ' selected="selected"';?>>2020</option>
                                    <option value="21" <?php if($startyear=='21')echo ' selected="selected"';?>>2021</option>
                                    <option value="22" <?php if($startyear=='22')echo ' selected="selected"';?>>2022</option>
                                </select>

                            </div>
                        </div>

                        <!-- Start Time Picker -->
                        <div class="form-group">
                            <label for="time_start">Starts At:</label>
                            <div class="row pl-3" id="time_start">

                                <select class="form-control col-4" id="startTime[hour]" name="startTime[hour]">
                                    <option value=""></option>
                                    <option <?php if($starthour=='1')echo ' selected="selected"';?>>1</option>
                                    <option <?php if($starthour=='2')echo ' selected="selected"';?>>2</option>
                                    <option <?php if($starthour=='3')echo ' selected="selected"';?>>3</option>
                                    <option <?php if($starthour=='4')echo ' selected="selected"';?>>4</option>
                                    <option <?php if($starthour=='5')echo ' selected="selected"';?>>5</option>
                                    <option <?php if($starthour=='6')echo ' selected="selected"';?>>6</option>
                                    <option <?php if($starthour=='7')echo ' selected="selected"';?>>7</option>
                                    <option <?php if($starthour=='8')echo ' selected="selected"';?>>8</option>
                                    <option <?php if($starthour=='9')echo ' selected="selected"';?>>9</option>
                                    <option <?php if($starthour=='10')echo ' selected="selected"';?>>10</option>
                                    <option <?php if($starthour=='11')echo ' selected="selected"';?>>11</option>
                                    <option <?php if($starthour=='12')echo ' selected="selected"';?>>12</option>
                                </select>

                                <p class="ml-1 mr-1">:</p>

                                <select class="form-control col-4" id="startTime[minute]" name="startTime[minute]">
                                    <option value=""></option>
                                    <option <?php if($startminute=='00')echo ' selected="selected"';?>>00</option>
                                    <option <?php if($startminute=='05')echo ' selected="selected"';?>>05</option>
                                    <option <?php if($startminute=='10')echo ' selected="selected"';?>>10</option>
                                    <option <?php if($startminute=='15')echo ' selected="selected"';?>>15</option>
                                    <option <?php if($startminute=='20')echo ' selected="selected"';?>>20</option>
                                    <option <?php if($startminute=='25')echo ' selected="selected"';?>>25</option>
                                    <option <?php if($startminute=='30')echo ' selected="selected"';?>>30</option>
                                    <option <?php if($startminute=='35')echo ' selected="selected"';?>>35</option>
                                    <option <?php if($startminute=='40')echo ' selected="selected"';?>>40</option>
                                    <option <?php if($startminute=='45')echo ' selected="selected"';?>>45</option>
                                    <option <?php if($startminute=='50')echo ' selected="selected"';?>>50</option>
                                    <option <?php if($startminute=='55')echo ' selected="selected"';?>>55</option>
                                </select>

                                <select class="form-control col-3 ml-1" id="startTime[period]" name="startTime[period]">
                                    <option value=""></option>
                                    <option <?php if($startperiod=='am')echo ' selected="selected"';?>>AM</option>
                                    <option <?php if($startperiod=='pm')echo ' selected="selected"';?>>PM</option>
                                </select>

                            </div>
                        </div>

                        <!-- End Date Picker
                        <div class="form-group">
                            <label for="date_end">Ends On:</label>
                            <div class="row pl-3" id="date_end">

                                <select class="form-control col-5 mr-2" id="endDate[month]" name="endDate[month]">
                                    <option value=""></option>
                                    <option value="01" <php if($endmonth=='01')echo ' selected="selected"';?>>January</option>
                                    <option value="02" <php if($endmonth=='02')echo ' selected="selected"';?>>Febuary</option>
                                    <option value="03" <php if($endmonth=='03')echo ' selected="selected"';?>>March</option>
                                    <option value="04" <php if($endmonth=='04')echo ' selected="selected"';?>>April</option>
                                    <option value="05" <php if($endmonth=='05')echo ' selected="selected"';?>>May</option>
                                    <option value="06" <php if($endmonth=='06')echo ' selected="selected"';?>>June</option>
                                    <option value="07" <php if($endmonth=='07')echo ' selected="selected"';?>>July</option>
                                    <option value="08" <php if($endmonth=='08')echo ' selected="selected"';?>>August</option>
                                    <option value="09" <php if($endmonth=='09')echo ' selected="selected"';?>>September</option>
                                    <option value="10" <php if($endmonth=='10')echo ' selected="selected"';?>>October</option>
                                    <option value="11" <php if($endmonth=='11')echo ' selected="selected"';?>>November</option>
                                    <option value="12" <php if($endmonth=='12')echo ' selected="selected"';?>>December</option>
                                </select>

                                <select class="form-control col-3 mr-2" id="endDate[day]" name="endDate[day]">
                                    <option value=""></option>
                                    <option value="01" <php if($endday=='01')echo ' selected="selected"';?>>1</option>
                                    <option value="02" <php if($endday=='02')echo ' selected="selected"';?>>2</option>
                                    <option value="03" <php if($endday=='03')echo ' selected="selected"';?>>3</option>
                                    <option value="04" <php if($endday=='04')echo ' selected="selected"';?>>4</option>
                                    <option value="05" <php if($endday=='05')echo ' selected="selected"';?>>5</option>
                                    <option value="06" <php if($endday=='06')echo ' selected="selected"';?>>6</option>
                                    <option value="07" <php if($endday=='07')echo ' selected="selected"';?>>7</option>
                                    <option value="08" <php if($endday=='08')echo ' selected="selected"';?>>8</option>
                                    <option value="09" <php if($endday=='09')echo ' selected="selected"';?>>9</option>
                                    <option <php if($endday=='10')echo ' selected="selected"';?>>10</option>
                                    <option <php if($endday=='11')echo ' selected="selected"';?>>11</option>
                                    <option <php if($endday=='12')echo ' selected="selected"';?>>12</option>
                                    <option <php if($endday=='13')echo ' selected="selected"';?>>13</option>
                                    <option <php if($endday=='14')echo ' selected="selected"';?>>14</option>
                                    <option <php if($endday=='15')echo ' selected="selected"';?>>15</option>
                                    <option <php if($endday=='16')echo ' selected="selected"';?>>16</option>
                                    <option <php if($endday=='17')echo ' selected="selected"';?>>17</option>
                                    <option <php if($endday=='18')echo ' selected="selected"';?>>18</option>
                                    <option <php if($endday=='19')echo ' selected="selected"';?>>19</option>
                                    <option <php if($endday=='20')echo ' selected="selected"';?>>20</option>
                                    <option <php if($endday=='21')echo ' selected="selected"';?>>21</option>
                                    <option <php if($endday=='22')echo ' selected="selected"';?>>22</option>
                                    <option <php if($endday=='23')echo ' selected="selected"';?>>23</option>
                                    <option <php if($endday=='24')echo ' selected="selected"';?>>24</option>
                                    <option <php if($endday=='25')echo ' selected="selected"';?>>25</option>
                                    <option <php if($endday=='26')echo ' selected="selected"';?>>26</option>
                                    <option <php if($endday=='27')echo ' selected="selected"';?>>27</option>
                                    <option <php if($endday=='28')echo ' selected="selected"';?>>28</option>
                                    <option <php if($endday=='29')echo ' selected="selected"';?>>29</option>
                                    <option <php if($endday=='30')echo ' selected="selected"';?>>30</option>
                                    <option <php if($endday=='31')echo ' selected="selected"';?>>31</option>
                                </select>

                                <select class="form-control col-3" id="endDate[year]" name="endDate[year]">
                                    <option value=""></option>
                                    <option value="17" <php if($endyear=='17')echo ' selected="selected"';?>>2017</option>
                                    <option value="18" <php if($endyear=='18')echo ' selected="selected"';?>>2018</option>
                                    <option value="19" <php if($endyear=='19')echo ' selected="selected"';?>>2019</option>
                                    <option value="20" <php if($endyear=='20')echo ' selected="selected"';?>>2020</option>
                                    <option value="21" <php if($endyear=='21')echo ' selected="selected"';?>>2021</option>
                                    <option value="22" <php if($endyear=='22')echo ' selected="selected"';?>>2022</option>
                                </select>

                            </div>
                        </div>
                        -->

                        <!-- End Time Picker -->
                        <div class="form-group">
                            <label for="time_end">Ends At:</label>
                            <div class="row pl-3" id="time_end">

                                <select class="form-control col-4" id="endTime[hour]" name="endTime[hour]">
                                    <option value=""></option>
                                    <option <?php if($endhour=='1')echo ' selected="selected"';?>>1</option>
                                    <option <?php if($endhour=='2')echo ' selected="selected"';?>>2</option>
                                    <option <?php if($endhour=='3')echo ' selected="selected"';?>>3</option>
                                    <option <?php if($endhour=='4')echo ' selected="selected"';?>>4</option>
                                    <option <?php if($endhour=='5')echo ' selected="selected"';?>>5</option>
                                    <option <?php if($endhour=='6')echo ' selected="selected"';?>>6</option>
                                    <option <?php if($endhour=='7')echo ' selected="selected"';?>>7</option>
                                    <option <?php if($endhour=='8')echo ' selected="selected"';?>>8</option>
                                    <option <?php if($endhour=='9')echo ' selected="selected"';?>>9</option>
                                    <option <?php if($endhour=='10')echo ' selected="selected"';?>>10</option>
                                    <option <?php if($endhour=='11')echo ' selected="selected"';?>>11</option>
                                    <option <?php if($endhour=='12')echo ' selected="selected"';?>>12</option>
                                </select>

                                <p class="ml-1 mr-1">:</p>

                                <select class="form-control col-4" id="endTime[minute]" name="endTime[minute]">
                                    <option value=""></option>
                                    <option <?php if($endminute=='00')echo ' selected="selected"';?>>00</option>
                                    <option <?php if($endminute=='05')echo ' selected="selected"';?>>05</option>
                                    <option <?php if($endminute=='10')echo ' selected="selected"';?>>10</option>
                                    <option <?php if($endminute=='15')echo ' selected="selected"';?>>15</option>
                                    <option <?php if($endminute=='20')echo ' selected="selected"';?>>20</option>
                                    <option <?php if($endminute=='25')echo ' selected="selected"';?>>25</option>
                                    <option <?php if($endminute=='30')echo ' selected="selected"';?>>30</option>
                                    <option <?php if($endminute=='35')echo ' selected="selected"';?>>35</option>
                                    <option <?php if($endminute=='40')echo ' selected="selected"';?>>40</option>
                                    <option <?php if($endminute=='45')echo ' selected="selected"';?>>45</option>
                                    <option <?php if($endminute=='50')echo ' selected="selected"';?>>50</option>
                                    <option <?php if($endminute=='55')echo ' selected="selected"';?>>55</option>
                                </select>

                                <select class="form-control col-3 ml-1" id="endTime[period]" name="endTime[period]">
                                    <option value=""></option>
                                    <option <?php if($endperiod=='am')echo ' selected="selected"';?>>AM</option>
                                    <option <?php if($endperiod=='pm')echo ' selected="selected"';?>>PM</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event Description Input -->
                <div class="form-group">
                    <label for="event_description">Description</label>
                    <textarea class="form-control text-left" id="event_description" name="event_description" rows="3"><?php echo "$event->event_description"; ?></textarea>
                </div>

                <!-- Cancle and Submit Button -->
                <a href="/">Cancel</a>
                <button type="submit" name="submit" value="Submit" class="btn btn-primary float-right">Create</button>
                <a href="/events/{{ $event->id }}/delete" class="text-white btn btn-danger float-right">Delete</a>

                <input type="hidden" name="date_start" value="" />
                <input type="hidden" name="date_end" value="" />
                <input type="hidden" name="time_start" value="" />
                <input type="hidden" name="time_end" value="" />

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
