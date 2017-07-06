<script type="text/javascript">
    $(document).ready(function() {
        $('.avatar-sm').mouseenter(function() {
            $('.sidebar-setting').removeClass('hide');
        });
        $('.sidebar-setting').mouseleave(function() {
            $('.sidebar-setting').addClass('hide');
        });
    });
</script>

                    <!-- Profile Picture, Name, Logout, Event Table, New Event Button -->
<div class="col-3 pt-3 sidebar">

    <!-- Logo -->
    <div class="center"><a href="/dashboard"><img src="{{ url('/images/logo_white.png') }}" class="logo" alt="YourUnity"></a></div>
    <hr class="side-hr mb-4"/>
                        <!-- Profile Picture -->
    <div class="text-center">
        <img src="/images/avatars/{{ Auth::user()->avatar }}" class="avatar-sm">
    </div>
    <div class="text-center">
        <div class="sidebar-setting text-center hide">
            <a href="/settings"><span class="lnr lnr-cog sidebar-setting-icon"></span></a>
        </div>
    </div>

                        <!-- Name and Logout Button -->
    <!-- <div class="text-center mt-3">
        <div class="btn-group">


            <a class="btn btn-secondary dropdown-toggle" href="/dashboard" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>


            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li class="pl-3">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div> -->

                        <!-- Table of Dates Of Events -->
    <div class="calendar mt-4">
        <a href="/events" class="no-highlight"><h3 class="text-center mb-3 mt-2">Your Events</h3></a>
        <div class="list-group line-stop">
            @foreach($events as $event)
                @if($event->user->id == Auth::user()->id)
                    <a href="/events/{{ $event->id }}" class="list-group-item list-group-item-action">
                        <div class="col-1 p-0"><b>
                            <span class="lnr lnr-calendar-full small-cal"></span>
                            <?php
                                // $print_date = $event->date
                            ?>
                            <?php
                                 // $print_date = DateTime::createFromFormat('Y-m-d H:i:s', $print_date);
                                 // echo($print_date->format('m/d'));
                            ?>

                        </b></div>
                        <div class="col-11 ">
                            <span class="">{{ $event->event_name }}</span>
                          </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>

                        <!-- Create New Event Button -->
    <a href="/events/create" class="btn btn-success btn-lg btn-block mt-4 new-event-sidebar" role="button" aria-disabled="true">Create Event</a>

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
    z-index: 999;
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

                    <!-- Script for Active Hover on Event Table -->
<script>
    $( ".list-group-item:first" ).addClass("active");

    $('.list-group-item').click(function() {
        $( ".list-group-item" ).each(function() {
            $(".list-group-item").removeClass("active");
        });
        $(this).addClass("active");
    });
</script>
