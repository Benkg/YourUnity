<?php

    $eventId = $event->id;

    //Select all of this events activity records IF it is a future event..
    $attendedList = App\ActivityRecord::where('event_id', $eventId)
                        ->where('activity_status','=', 0)
                        ->orderBy('created_at', 'DESC')
                        ->get();

    if(isset($attendedList[0])) {
        //Attendee List
        echo'
        <div class="card  mt-4 mb-4 p-3">

            <div class="row card-block">

                    <h3 class="col-6">Volunteers</h3>

                    <!-- CSV Form -->
                    <form class = "col-6 text-right" method="POST" action="/download/'.$eventId.'">
                      '.csrf_field().'
                      <button class="btn btn-primary text-size-large">Download CSV file</button>
                    <form>

            </div>

            <hr />

            <div class="card-block">

                <div class="row text-center mb-4">
                    <div class="col-6"><h4>Volunteer Name</h4></div>
                    <div class="col-6"><h4>Total Time Volunteered</h4></div>
                </div>';
                //<div class="col-4"><h4>Volunteer Organization</h4></div>

                foreach($attendedList as $registered){
                    $attendeeId = $registered->attendee_id;
                    $attendeeName = App\Attendee::where('id', $attendeeId)->value('name_first').' '.
                                    App\Attendee::where('id', $attendeeId)->value('name_last');
                    $duration = $registered->duration;

                    echo
                    '<div class="row text-center mb-2">
                        <div class="col-6"><span>'.$attendeeName.'</span></div>
                        <div class="col-6"><span>'.secsToTime($duration).'</span></div>
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

    .csv-button {
        background-color: #2e2e2e !important;
        color: #6bbaa7 !important;
        border: 2px solid #6bbaa7 !important; /* Green */
    }
</style>
