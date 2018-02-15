<?php
    $address = $location->address;
    $city = $location->city;
    $zip = $location->postal_code;
?>

<!-- Duplicate Form -->
<form method="POST" action="/events">
    {{ csrf_field() }}

    <div class="card card-inverse text-center col-centered mb-4 p-3" >
        <div class="card-block">

            <h1 class="white text-center">Duplicate Event</h1>
            <hr class="col-11"/>
            <h3 class="card-title">Enter a new date and time for this event.</h3>

            <div class="col-centered col-6">
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
                            <option value=""></option>
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

            <!-- Cancle and Duplicate Buttons -->
            <a href="/events/{{ $event->id }}" class="float-left">Cancel</a>
            <button type="submit" class="btn btn-primary float-right ml-3">Next</button>
      </div>
  </div>

    <!-- Event ID (Hidden)-->
    <div class="form-group invisible">
        <input type="text" class="form-control" id="duplicate_id" aria-describedby="emailHelp" value="{{$event->id}}" name="duplicate_id">
    </div>

    <!-- Event Name (Hidden)-->
    <div class="form-group invisible">
        <label for="event_name">Event name</label>
        <input type="text" class="form-control" id="event_name" aria-describedby="emailHelp" value="{{$event->event_name}}" name="event_name">
    </div>

    <!-- Event Location (Hidden)-->
    <div class="form-group invisible">
        <label for="location">Location of Event</label>
        <div id=location>
            <input type="text" class="form-control mb-2" id="location[address]" aria-describedby="locationHelp" <?php echo 'value="'.$address.'"'; ?> name="location[address]">
            <input type="text" class="form-control mb-2" id="location[city]" aria-describedby="locationHelp" <?php echo 'value="'.$city.'"'; ?> name="location[city]">
            <input type="text" class="form-control" id="location[zip]" aria-describedby="locationHelp" <?php echo 'value="'.$zip.'"'; ?> name="location[zip]">
        </div>
    </div>

    <!-- Event Description (Hidden)-->
    <div class="form-group invisible">
        <label for="event_description">Event Description</label>
        <textarea class="form-control text-left" id="event_description" name="event_description" rows="3"><?php echo "$event->event_description"; ?></textarea>
    </div>

    <!-- Event Type (Hidden)-->
    <div class="form-group invisible">
        <label for="event_type">Event Type</label>
        <input type="text" class="form-control" id="event_type" name="event_type"><?php echo "$event->type_id"; ?></input>
    </div>

    <!-- Event Type (Hidden)-->
    <div class="form-group">
        <label for="event_type">Event Type</label>
        <select class="form-control" id="event_type" name="event_type">
            <option value="<?php echo "$event->type_id"; ?>" <?php echo ' selected="selected"';?>></option>
        </select>
    </div>

</form>
