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

<!-- Profile Picture, Name, Logout, Event Table, New Event Button -->
<div class="col-3 pt-3 sidebar container">


    <!-- Menu -->
    @include('layouts.menu.main')

    <!-- Logo -->
    <div class="center"><a href="/dashboard"><img src="{{ url('/images/YU_001_White.svg') }}" class="logo" alt="YourUnity"></a></div>

    <!-- Profile Picture -->
    <div class="text-center">
        <a href="/settings"><img src="/images/avatars/{{ Auth::user()->avatar }}" class="avatar-sm"></a>
    </div>
    <hr class="side-hr mt-4"/>
    <!-- Table of Dates Of Events -->
    <div class="calendar mt-4">
        <div class="list-group line-stop">
            <h3 class="text-center mb-2">Upcoming Events</h3>

            <!-- start a count var -->
            <?php $count = 1; ?>

            @foreach($events as $event)
                @if($event->user->id == Auth::user()->id)

                    <!-- Main Link to Event -->
                    <a href="/events/{{ $event->id }}" class="list-group-item list-group-item-action">

                        <!-- Calendar Icon -->
                        <div class="col-1 p-0">
                            <b>
                                <span class="lnr lnr-calendar-full small-cal"></span>
                                <!-- we should use the same code as "days till next event" to just put # of days till event -->
                            </b>
                        </div>

                        <!-- Event name -->
                        <div class="col-11 ">
                            <span class="">{{ $event->event_name }}</span>
                        </div>
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
    <a href="/events/create" class="btn btn-success btn-lg btn-block mt-4 new-event-sidebar" role="button" aria-disabled="true">Create Event</a>

    <!-- All Events -->
    <div class="col-centered">
        <h3 class="text-center"><a href="/events" class="all_events no-highlight" aria-disabled="true">View All Events</a></h3>
    </div>

</div>
                    <!-- Custom Styles -->
<style type="text/css">

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

</style>

{{ flashURL() }}

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
    });


    /* When All Events link is clicked, don't highlight it */
    $(".all_events").removeClass("active");

</script>
