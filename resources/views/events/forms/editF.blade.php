<?php
    $starts = $event->starts;
    $ends = $event->ends;
    $starting = parseTime($starts);
    $ending = parseTime($ends);

    $address = $location->address;
    $city = $location->city;
    $zip = $location->postal_code;
    $currentLat = $location->latitude;
    $currentLng = $location->longitude;

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
<!-- Create Event Form -->
<div class="card mb-4 p-3">
    <dv class="card-block">


        <h1 class="white text-center">Edit Event</h1>
        <hr class="col-11"/>

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
                            <input type="text" class="form-control mb-2" id="address" aria-describedby="locationHelp" <?php echo 'value="'.$address.'"'; ?>>
                            <input type="text" class="form-control mb-2" id="city" aria-describedby="locationHelp" <?php echo 'value="'.$city.'"'; ?>>
                            <input type="text" class="form-control" id="zip" aria-describedby="locationHelp" <?php echo 'value="'.$zip.'"'; ?>>
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

            <div class="row">
                <div class="col-3">
                    <div class="row">
                        <div onclick="geocode()" class="btn btn-primary float-right ml-3">Update Location</div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="event_type">Event Type:</label>
                            <select class="form-control" id="event_type" name="event_type">
                                <option value=""></option>
                                <option value="1"<?php if($event->type_id=='1')echo ' selected="selected"';?>>Animals</option>
                                <option value="2"<?php if($event->type_id=='2')echo ' selected="selected"';?>>Education</option>
                                <option value="3"<?php if($event->type_id=='3')echo ' selected="selected"';?>>Elderly</option>
                                <option value="4"<?php if($event->type_id=='4')echo ' selected="selected"';?>>Enviornment</option>
                                <option value="5"<?php if($event->type_id=='5')echo ' selected="selected"';?>>Food</option>
                                <option value="6"<?php if($event->type_id=='6')echo ' selected="selected"';?>>Homeless</option>
                                <option value="7"<?php if($event->type_id=='7')echo ' selected="selected"';?>>Humanities</option>
                                <option value="8"<?php if($event->type_id=='8')echo ' selected="selected"';?>>Local Government</option>
                                <option value="9"<?php if($event->type_id=='9')echo ' selected="selected"';?>>Museum</option>
                                <option value="10"<?php if($event->type_id=='10')echo ' selected="selected"';?>>Technology</option>
                                <option value="11"<?php if($event->type_id=='11')echo ' selected="selected"';?>>Youth</option>
                                <option value="12"<?php if($event->type_id=='12')echo ' selected="selected"';?>>Other</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="form-group">
                        <label for="event_description">Description</label>
                        <textarea class="form-control text-left" id="event_description" name="event_description" rows="3"><?php echo "$event->event_description"; ?></textarea>
                    </div>
                </div>
            </div>

            <div class="card mb-4 p-3">
                <div class="card-block">
                    <div id="map"></div>
                </div>
            </div>

            <!-- Cancle and Submit Button -->
            <a href="/events/{{ $event->id }}" class="float-left">Cancel</a>
            <button type="submit" class="btn btn-primary float-right ml-3">Save</button>

            <input type="hidden" id="currentLat" value="<?php echo "$currentLat"; ?>" />
            <input type="hidden" id="currentLng" value="<?php echo "$currentLng"; ?>" />

            <input type="hidden" id="location[address]" value="" name="location[address]" />
            <input type="hidden" id="location[city]" value="" name="location[city]" />
            <input type="hidden" id="location[state]" value="" name="location[state]" />
            <input type="hidden" id="location[zip]" value="" name="location[zip]" />
            <input type="hidden" id="location[country]" value="" name="location[country]" />
            <input type="hidden" id="location[latitude]" value="" name="location[latitude]" />
            <input type="hidden" id="location[longitude]" value="" name="location[longitude]" />

        </form>
    </div>
</div>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA13S6dkirm_vs0FKaBDj0IhD9gQSqPUsc&callback=initMap">
</script>

<script>
    function initMap(latitude, longitude) {
        var place = {lat: latitude, lng: longitude};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: place
        });
        var marker = new google.maps.Marker({
          position: place,
          map: map
        });
    }
</script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    function geocode(){

        var address, number, street, city, state, country, zip, latitude, longitude;

        address = document.getElementById("address").value;
        city = document.getElementById("city").value;
        zip = document.getElementById("zip").value;
        state = 'CA';

        var location = address + ', ' + city + ', ' + state + zip;

        axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
            params:{
              address: location,
              key: 'AIzaSyA13S6dkirm_vs0FKaBDj0IhD9gQSqPUsc'
            }
        })
        .then(function(response){
            number = response.data.results[0].address_components[0].long_name;
            street = response.data.results[0].address_components[1].long_name;
            city = response.data.results[0].address_components[3].long_name;
            state = response.data.results[0].address_components[5].long_name;
            country = response.data.results[0].address_components[6].long_name;
            zip = response.data.results[0].address_components[7].long_name;
            latitude = response.data.results[0].geometry.location['lat'];
            longitude = response.data.results[0].geometry.location['lng'];

            document.getElementById('location[address]').value = number +' '+street;
            document.getElementById('location[city]').value = city;
            document.getElementById('location[state]').value = state;
            document.getElementById('location[zip]').value = zip;
            document.getElementById('location[country]').value = country;
            document.getElementById('location[latitude]').value = latitude;
            document.getElementById('location[longitude]').value = longitude;

            initMap(latitude, longitude);
        });

    };
</script>

<script>
    geocode();
</script>

<style>
    #map {
      height: 70vh;
    }
</style>
