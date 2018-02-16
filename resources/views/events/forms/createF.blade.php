<!-- Create Event Form -->
<form id="top" method="POST" action="/events">
    {{ csrf_field() }}
    <div class="form">

        <div class="page">
            <div class="card mb-4 p-3">
                <div class="card-block">
                  <h1 class="white text-center">Create Event</h1>
                  <hr class="col-11"/>

                    <div class="row">
                        <div class="col-6">
                            <!-- Event Name -->
                            <div class="form-group">
                                <label for="event_name">Event name</label>
                                <input type="text" class="form-control" id="event_name" aria-describedby="emailHelp" placeholder="Enter event name" name="event_name">
                            </div>

                            <!-- Event Location -->
                            <div class="form-group">
                                <label for="loc">Location of Event</label>
                                <div id="loc">
                                    <input type="text" class="form-control mb-2" id="address" aria-describedby="locationHelp" placeholder="Street Address">
                                    <input type="text" class="form-control mb-2" id="city" aria-describedby="locationHelp" placeholder="City">
                                    <input type="text" class="form-control" id="zip" aria-describedby="locationHelp" placeholder="Postal Code">
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <!-- Start Date Picker -->
                            <div class="form-group">
                                <label for="date_start">Event Date:</label>
                                <div class="row pl-3" id="date_start">

                                    <select class="form-control col-5 mr-2" id="startDate[month]" name="startDate[month]">
                                        <option value=""></option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>

                                    <select class="form-control col-3 mr-2" id="startDate[day]" name="startDate[day]">
                                        <option value=""></option>
                                        <option value="01">1</option>
                                        <option value="02">2</option>
                                        <option value="03">3</option>
                                        <option value="04">4</option>
                                        <option value="05">5</option>
                                        <option value="06">6</option>
                                        <option value="07">7</option>
                                        <option value="08">8</option>
                                        <option value="09">9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>
                                    </select>

                                    <select class="form-control col-3" id="startDate[year]" name="startDate[year]">
                                        <option value="18" >2018</option>
                                        <option value="19" >2019</option>
                                        <option value="20" >2020</option>
                                        <option value="21" >2021</option>
                                        <option value="22" >2022</option>
                                    </select>

                                </div>
                            </div>

                            <!-- Start Time Picker -->
                            <div class="form-group">
                                <label for="time_start">Start Time:</label>
                                <div class="row pl-3" id="time_start">

                                    <select class="form-control col-4" id="startTime[hour]" name="startTime[hour]">
                                        <option value=""></option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                    </select>

                                    <p class="ml-1 mr-1">:</p>

                                    <select class="form-control col-4" id="startTime[minute]" name="startTime[minute]">
                                        <option value=""></option>
                                        <option>00</option>
                                        <option>05</option>
                                        <option>10</option>
                                        <option>15</option>
                                        <option>20</option>
                                        <option>25</option>
                                        <option>30</option>
                                        <option>35</option>
                                        <option>40</option>
                                        <option>45</option>
                                        <option>50</option>
                                        <option>55</option>
                                    </select>

                                    <select class="form-control col-3 ml-1" id="startTime[period]" name="startTime[period]">
                                        <option value=""></option>
                                        <option>AM</option>
                                        <option>PM</option>
                                    </select>

                                </div>
                            </div>

                            <!-- End Date Picker
                            <div class="form-group">
                                <label for="date_end">Ends On:</label>
                                <div class="row pl-3" id="date_end">

                                    <select class="form-control col-5 mr-2" id="endDate[month]" name="endDate[month]">
                                        <option value=""></option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>

                                    <select class="form-control col-3 mr-2" id="endDate[day]" name="endDate[day]">
                                        <option value=""></option>
                                        <option value="01">1</option>
                                        <option value="02">2</option>
                                        <option value="03">3</option>
                                        <option value="04">4</option>
                                        <option value="05">5</option>
                                        <option value="06">6</option>
                                        <option value="07">7</option>
                                        <option value="08">8</option>
                                        <option value="09">9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>
                                    </select>

                                    <select class="form-control col-3" id="endDate[year]" name="endDate[year]">
                                        <option value=""></option>
                                        <option value="17" >2017</option>
                                        <option value="18" >2018</option>
                                        <option value="19" >2019</option>
                                        <option value="20" >2020</option>
                                        <option value="21" >2021</option>
                                        <option value="22" >2022</option>
                                    </select>

                                </div>
                            </div>
                            -->

                            <!-- End Time Picker -->
                            <div class="form-group">
                                <label for="time_end">End Time:</label>
                                <div class="row pl-3" id="time_end">

                                    <select class="form-control col-4" id="endTime[hour]" name="endTime[hour]">
                                        <option value=""></option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                    </select>

                                    <p class="ml-1 mr-1">:</p>

                                    <select class="form-control col-4" id="endTime[minute]" name="endTime[minute]">
                                      <option value=""></option>
                                      <option>00</option>
                                      <option>05</option>
                                      <option>10</option>
                                      <option>15</option>
                                      <option>20</option>
                                      <option>25</option>
                                      <option>30</option>
                                      <option>35</option>
                                      <option>40</option>
                                      <option>45</option>
                                      <option>50</option>
                                      <option>55</option>
                                    </select>

                                    <select class="form-control col-3 ml-1" id="endTime[period]" name="endTime[period]">
                                        <option value=""></option>
                                        <option>AM</option>
                                        <option>PM</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Event Type and Description Input -->
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="time_start">Event Type:</label>
                                <select class="form-control" id="event_type" name="event_type">
                                    <option value=""></option>
                                    <option value="1">Animals</option>
                                    <option value="2">Education</option>
                                    <option value="3">Elderly</option>
                                    <option value="4">Enviornment</option>
                                    <option value="5">Food</option>
                                    <option value="6">Homeless</option>
                                    <option value="7">Humanities</option>
                                    <option value="8">Local Government</option>
                                    <option value="9">Museum</option>
                                    <option value="10">Technology</option>
                                    <option value="11">Youth</option>
                                    <option value="12">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-9 mb-4">
                            <div class="form-group">
                                <label for="event_description">Description</label>
                                <textarea class="form-control" id="event_description" name="event_description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Cancle and Submit Button -->
                    <a href="/">Cancel</a>
                    <div id="showMap" onclick="geocode()" class="btn btn-primary float-right ml-3">Next</div>

                    <input type="hidden" id="location[address]" value="" name="location[address]" />
                    <input type="hidden" id="location[city]" value="" name="location[city]" />
                    <input type="hidden" id="location[state]" value="" name="location[state]" />
                    <input type="hidden" id="location[zip]" value="" name="location[zip]" />
                    <input type="hidden" id="location[country]" value="" name="location[country]" />
                    <input type="hidden" id="location[latitude]" value="" name="location[latitude]" />
                    <input type="hidden" id="location[longitude]" value="" name="location[longitude]" />

                </div>
            </div>
        </div>

        <div class="page map-section">
            <div class="card mb-4 p-3">
                <div class="card-block">
                    <div id="map"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-block">
                    <a href="#top">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Confirm Location</button>
                </div>
            </div>

        </div>

        <!-- <div class="page">
            <div class="card mb-4 p-3">
                <div class="card-block">

                </div>
            </div>
        </div> -->

    </div>
</form>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    $("#showMap").click(function() {
        $('html,body').animate({
            scrollTop: $(".map-section").offset().top},
            'slow');
    });

    function geocode(){
        var number, street, poi, address, city, state, country, zip, latitude, longitude;

        address = document.getElementById("address").value;
        city = document.getElementById("city").value;
        zip = document.getElementById("zip").value;
        state = 'CA';

        var location = address + city + state + zip;
        location = location.split(' ').join('+');
        endpoint = "https://maps.googleapis.com/maps/api/geocode/json?address=";
        endpoint= endpoint + location + "&key=AIzaSyA13S6dkirm_vs0FKaBDj0IhD9gQSqPUsc"; //Concatenates endpoint with query and API key.
        fetch(endpoint)
        .then(function(response){
            response.json().then(data=>{
                 var loc = data.results[0];
                 latitude = loc.geometry.location.lat;
                 longitude = loc.geometry.location.lng;

                for (var i=0; i<loc.address_components.length; i++) {
                    for (var j=0; j<loc.address_components[i].types.length; j++) {

                        var type = loc.address_components[i].types[j];
                        var data = loc.address_components[i].short_name;

                        if (type == "street_number") {
                            number = data;
                        } else if (type == "route"){
                            street = data;
                        } else if (type == "point_of_interest"){
                            poi = data;
                        } else if (type == "locality"){
                            city = data;
                        } else if (type == "administrative_area_level_1"){
                            state = data;
                        } else if (type == "country"){
                            country = data;
                        } else if (type == "postal_code"){
                            zip = data;
                        }

                    }
                }

                if(number){
                    address = number + ' ' + street;
                } else {
                address = poi + ' ' + street;
                }

                document.getElementById('location[address]').value = address;
                document.getElementById('location[city]').value = city;
                document.getElementById('location[state]').value = state;
                document.getElementById('location[zip]').value = zip;
                document.getElementById('location[country]').value = country;
                document.getElementById('location[latitude]').value = latitude;
                document.getElementById('location[longitude]').value = longitude;

                initMap(latitude, longitude);
            });
        });

    };

</script>

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

<style>

#map {
  height: 70vh;
}

.form {
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;

  flex-direction: column;
}

.page {
  height: 100vh;
}

</style>
