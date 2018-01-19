<?php

    $eventId = $event->id;

    //Select all of this events activity records IF it is a future event..
    $attendingList = App\ActivityRecord::where('event_id', $eventId)
                        ->where('activity_status','=', 1)
                        ->orderBy('created_at', 'DESC')
                        ->get();

    if(isset($attendingList[0])) {
        //Attendee List
        echo'
        <div class="card  mt-4 mb-4 p-3">

            <div class="row card-block">

                    <h3 class="col-6">Checked-In Volunteers</h3>

            </div>

            <hr />

            <div class="card-block">

                <div class="row text-center mb-4">
                    <div class="col-6"><h4>Volunteer Name</h4></div>
                </div>';
                //<div class="col-4"><h4>Volunteer Organization</h4></div>

                foreach($attendingList as $registered){
                    $attendeeId = $registered->attendee_id;
                    $attendeeName = App\Attendee::where('firedb_id', $attendeeId)->value('name');
                    $duration = $registered->duration;

                    echo
                    '<div class="row text-center mb-2">
                        <div class="col-6"><span>'.$attendeeName.'</span></div>
                        <div class="col-6"><span></span></div>
                    </div>';

                }

        echo
            '</div>
        </div>';// to close off card and card block
    }

?>
