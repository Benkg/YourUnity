<script type="text/javascript">
    $(document).ready(function() {
        $('.avatar-sm').mouseenter(function() {
            $('.avatar-sm').addClass('blue-outline');
            $('.avatar-sm').addClass('pointer');
        });
        $('.avatar-sm').mouseleave(function() {
            $('.avatar-sm').removeClass('blue-outline');
            $('.avatar-sm').removeClass('pointer');
        });

        $('.avatar.sm').click(function() {
        });
    });
</script>

<?php
    $nonPastEvents = getNonPastEvents();
?>
        <!-- SideBar -->
        <!-- Profile Picture, Name, Logout, Event Table, New Event Button -->
        <div class="col-3 pt-3 sidebar container">


            <!-- Menu -->
            @include('layouts.menu.main')

            <!-- Logo -->
            <div class="center mb-3"><a href="/dashboard"><img src="{{ url('/images/YU_001_White.svg') }}" class="logo img-fluid" alt="YourUnity"></a></div>

            <!-- Profile Picture -->
            <div class="text-center">
                <a href="/settings"><img src="/images/avatars/{{ Auth::user()->avatar }}" class="rounded img-fluid"></a>
            </div>
            <hr class="side-hr mt-4"/>
            <!-- Table of Dates Of Events -->
            <div class="calendar mt-4">
                <div class="list-group line-stop">
                    <h3 class="text-center mb-3">Upcoming Events</h3>

                    <!-- start a count var -->
                    <?php $count = 1; ?>

                    @foreach($nonPastEvents as $event)
                        @if($event->time_state == 2)

                            <!-- Main Link to Event -->
                            <a href="/events/{{ $event->id }}" class="list-group-item list-group-item-action">
                                <span class="truncate">
                                    <!--Time until Event -->
                                    <?php
                                        $time = timeUntil($event->starts);
                                        echo secsToTimeShort($time);
                                    ?>                                                       
                                    <!-- Calendar Icon -->
                                    <b>
                                        <span class="lnr lnr-calendar-full small-cal"></span>
                                    </b>                                    
                                    <!-- Event name -->                                   
                                    <span id = "eventName">{{ $event->event_name }}</span>
                                </span>
                            </a>

                            <!-- If 5 events have loaded, break. Else, keep loading. -->
                            <?php
                                if ($count == 5){
                                    break;
                                } else {
                                    $count++;
                                }
                            ?>

                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Create New Event Button -->
            <a href="/events/create" class="btn btn-success  btn-block mt-4 responsive-button" role="button" aria-disabled="true">Create Event</a>

            <!-- All Events -->
            <div class="col-centered">
                <h3 class="text-center"><a href="/events" class="all_events no-highlight" aria-disabled="true">View All Events</a></h3>
            </div>

        </div>

<!-- Custom Styles -->
<style type="text/css">
.responsive-button { 
overflow: hidden;
white-space: nowrap;

}

#eventName {
  padding-left: 0.5rem;
  margin-left: 0.5rem;
  border-left: 2px solid #6bbaa7;
}

.hide {
    display: none;
}

h3 {
    color: #fff;
    font-weight: 200;
}

.active {
    background: #6bbaa7 !important;
    border: #6bbaa7 !important;
    opacity: 1;
    z-index: 2;
}

.btn {
    background: #6bbaa7 !important;
    border: #6bbaa7 !important;
    color: #fff !important;
}

.line-stop {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis
}

.list-group-item {
    background: rgba(46, 46, 46, 0.4);
    color: #e3e3e3 !important;
    font-weight: 200;
}

.list-group-item:hover {
    background: #6bbaa7 !important;
}

.truncate {
    display:inline;
  overflow: hidden;
  text-overflow: ellipsis;
}

</style>

                    <!-- Script for Active Hover on Event Table -->
<script>

    /* stores current window pathname in full */
    var route = window.location.pathname;

    /* Whatever page this is, highlight that option */
    if (route !== "/dashboard"){
        $("a[href$= '" + route + "']" ).addClass("active");
    }

    /* When hovering, give that class an active look */
    $(".list-group").hover(function(){

        $('.list-group-item').hover(function() {
            $( ".list-group-item" ).each(function() {
                $(".list-group-item").removeClass("active");
            });
            $(this).addClass("active");
        });
    });

    /* When the mouse leaves, return highlight to orignial value.. Wet code, same as above */
    $(".list-group").mouseleave(function(){

        $( ".list-group-item" ).each(function() {
            $(".list-group-item").removeClass("active");
        });

        if (route !== "/dashboard"){
            $("a[href$= '" + route + "']" ).addClass("active");
        }

        /* When All Events link is clicked, don't highlight it */
        $(".all_events").removeClass("active");
        $(".this_event").removeClass("active");
    });


    /* When All Events link is clicked, don't highlight it */
    $(".all_events").removeClass("active");


</script>
