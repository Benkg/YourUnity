                    <!-- Event Card -->
<div class="card mt-4 mb-4 p-3">
    <div class="card-block">


                        <!-- Event Name -->
        <div class="row">
            <h4 class=" card-title col-9"><a href="/events/{{ $event->id }}" class="no-highlight">{{ $event->event_name }}</a></h4>
            <a href="/events/{{ $event->id }}/edit" class="card-link col-3 text-right">Edit</a>
        </div>
        <!-- Event Logistics and Requirements -->
        <div class="card">
            <div class="card-block">
                <div class="row">

                    <!-- Logistics -->
                    <h6 class="card-subtitle text-muted col-2"><span class="lnr lnr-calendar-full"></span> {{ $event->date }}</h6>
                    <h6 class="card-subtitle text-muted col-4"><span class="lnr lnr-clock"></span></span> {{ $event->time_start }} - ##:## PM</h6>
                    <h6 class="card-subtitle text-muted col-6"><span class="lnr lnr-map-marker"></span>{{ $event->location }}</h6>

                </div>
            </div>
        </div>

                        <!-- Event Description -->
        <div class="card mb-2 text-center">
            <div class="card-block">
                <p class="card-text text-center">{{ $event->event_description }}</p>
            </div>
        </div>

    </div>
</div>
