@extends('layouts.master')
@section('page_title')
Create Event
@endsection

@section('content')
@include('layouts.header')

<!-- Event Title, Errors Banner, and Create Event Form -->
<div class="container">

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
    <form method="POST" action="/attachments/remove" enctype="multipart/form-data">
        {{ csrf_field() }}
        <?php
            if($event_att_arr){
            echo '
            <div class="card card-inverse text-center " style="margin: 2vh auto; width: 50vw; background-color: #333; border-color: #333;">
            <div class="card-block">

            <h1 class = "card-title">'.$event->event_name.' has the following attachments.</h1>
            <p>Select those you wish to remove</p>
            <hr />
            ';

            $index = 0;

            foreach($event_att_arr as $attachment){
                echo '
                    <div class="form-check">

                        <label class="form-check-label" for='.$index.'>
                            <input type="checkbox" class="form-check-input" name='.$index.' id='.$index.' value='.$attachment->unique_name.'>
                            '.$attachment->name.'
                        </label>

                    </div>
                ';

                $index++;
            }

            $event_id = $event->id;
            echo '
            <input type="hidden" name="event_id" value='.$event_id.'/>

            <div>
                <button type="submit" class="text-white btn btn-danger">Remove</button>
            </div>

            </div>
            </div>
            ';
        }?>
    </form>

    <!-- Select Attachment for Event Form -->
    <form method="POST" action="/attachments/attach" enctype="multipart/form-data">
        {{ csrf_field() }}
        <?php
            if($other_att_arr){
            echo '
                <div class="card card-inverse text-center " style="margin: 2vh auto; width: 50vw; background-color: #333; border-color: #333;">
                    <div class="card-block">

                        <h1 class = "card-title">The following attachments are available to add</h1>
                        <p>Select those you wish to attach to '.$event->event_name.'</p>
                        <hr />';


            $index = 0;

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

            $event_id = $event->id;
            echo '
            <input type="hidden" name="event_id" value='.$event_id.'/>

            <div>
              <button type="submit" class="text-white btn btn-primary">Attach</button>
            </div>

            </div>
            </div>';

        }?>
    </form>

</div>
@endsection

                    <!-- Custom Styles -->
<style>

.hidden {
  display: none;
}

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
