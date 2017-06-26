                    <!-- Profile Picture, Name, Logout, Event Table, New Event Button -->
<div class="col-3 pt-3 sidebar">

                        <!-- Profile Picture -->
    <div class="text-center">
        <img src="/images/avatars/{{ Auth::user()->avatar }}" class="avatar-sm">
    </div>

                        <!-- Name and Logout Button -->
    <div class="text-center mt-3">
        <div class="btn-group">

                            <!-- Name -->
            <a class="btn btn-secondary dropdown-toggle" href="/dashboard" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>

                            <!-- Logout Dropdown and Button -->
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
    </div>

                        <!-- Table of Dates Of Events -->
    <div class="calendar mt-4">
        <h3 class="text-center mb-3 mt-5">Your Events</h3>
        <div class="list-group line-stop">
            @foreach($events as $event)
                @if($event->user->id == Auth::user()->id)
                    <a href="/events/{{ $event->id }}" class="list-group-item list-group-item-action">
                        <div class="col-6 p-0"><b>{{ $event->date }}</b></div>
                        <div class="col-6 ">
                            <span class="text-right">{{ $event->event_name }}</span>
                          </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>

                        <!-- Create New Event Button -->
    <a href="/events/create" class="btn btn-success btn-lg btn-block mt-4" role="button" aria-disabled="true">Create Event</a>

</div>
                    <!-- Custom Styles -->
<style type="text/css">
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
