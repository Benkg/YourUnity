 <?php
/* blade for when event is live. Shows count of volunteered (displays accounts?).
    eventually to be used for communication during live events?



    $eventId = $event->id;

    //Select all of this events activity records IF it is a future event..
    $attendedList = App\ActivityRecord::where('event_id', $eventId)
                        ->where('activity_status','=', 1)
                        ->orderBy('created_at', 'DESC')
                        ->get();

    if(isset($attendedList[0])) {
        //Attendee List
        echo'
        <div class="card">

            <div class="card-header card-inverse" style="background-color: #6bbaa7; color: #fff;">
                <h5>Registered Volunteers</h5>
            </div>

            <div class="card-block">

                <div class="row text-center mb-4">
                    <div class="col-6"><h4>Volunteer Name</h4></div>
                    <div class="col-6"><h4>Registration Time</h4></div>
                </div>';
                //For when we do organization groups in volunteering
                //<div class="col-4"><h4>Volunteer Organization</h4></div>

                foreach($registeredList as $registered){
                    $attendeeId = $registered->attendee_id;
                    $registeredAt = $registered->created_at;
                    $attendeeName = App\Attendee::where('firedb_id', $attendeeId)->value('name');
                    $registeredAt = strtotime($registeredAt);

                    echo
                    '<div class="row text-center mb-2">
                        <div class="col-6"><span>'.$attendeeName.'</span></div>
                        <div class="col-6"><span>'.printTime($registeredAt).' on '.printDate($registeredAt).'</span></div>
                    </div>';

                }
        echo
            '</div>
        </div>';// to close off card and card block
    }

?>
<style>
    h5 {
        font-weight: 200;
        margin: 0;
    }
</style>

*/ 
