<!-- Creates two arrays, one of this events attachments the other of user attachments not on this event -->
<?php
    $eventId = $event->id;
    $userId = Auth::user()->id;

    $event_attachments = DB::table('event_attachments')->where('event_id', '=', $eventId)->orderBy('created_at', 'DESC')->get();
    $user_attachments = DB::table('attachments')->where('user_id', '=', $userId)->orderBy('created_at', 'DESC')->get();

    $event_att_arr = array();
    $other_att_arr = array();
    $event_index = 0;
    $other_index = 0;
    $attached = 0;

    foreach($user_attachments as $user_att){
        foreach($event_attachments as $event_att){
            if($user_att->unique_name == $event_att->attachment_id){
                $event_att_arr[$event_index] = $user_att;
                $event_index ++;
                $attached = 1;
            }
        }
        if(!$attached){
            $other_att_arr[$other_index] = $user_att;
            $other_index ++;
        }
        $attached = 0;
    }
?>

<!-- Select Attachment for Event Form -->
<form method="POST" action="/attachments/attach" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="card card-inverse text-center " style="margin: 2vh auto; width: 50vw; background-color: #333; border-color: #333;">
            <div class="card-block">

            <h1 class="white text-center">Attachments for {{ $event->event_name }}</h1>
            <hr class="col-11"/>
            <?php

                $index = 0;

                if($event_att_arr){

                    foreach($event_att_arr as $attachment){
                        echo '
                            <div class="form-check">

                                <label class="form-check-label" for='.$index.'>
                                    <input type="checkbox" class="form-check-input" checked="checked" name='.$index.' id='.$index.' value='.$attachment->unique_name.'>
                                    '.$attachment->name.'
                                </label>

                            </div>
                        ';

                        $index++;
                    }

                }

                if($other_att_arr){

                    foreach($other_att_arr as $attachment){
                        echo '
                            <div class="form-check">

                              <label class="form-check-label" for="other'.$index.'">
                                  <input type="checkbox" class="form-check-input" name='.$index.' id="other'.$index.'" value='.$attachment->unique_name.'>
                                  '.$attachment->name.'
                              </label>

                            </div>
                        ';

                        $index++;
                    }

                }
            ?>
        </div>
    </div>
    <div class="col-9 col-centered">
        <a href="/events/{{ $event->id }}" class="float-left">Cancel</a>
        <button type="submit" class="float-right text-white btn btn-primary">Done</button>
        <a href="/attachments/manager" class="float-right pr-4 pt-1">Upload Attachments</a>
    </div>

    <?php
        $event_id = $event->id;
        echo '<input type="hidden" name="event_id" value="'.$event_id.'"/>';
        foreach($event_att_arr as $att)
        {
          echo '<input type="hidden" name="old_event_atts[]" value="'.$att->unique_name.'"/>';
        }
    ?>
</form>
