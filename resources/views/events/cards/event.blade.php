
<!-- Event Card -->
<div class="card mt-4 mb-4 p-3">
    <div class="card-block">

        <div class="row">

            <div class="col-6">
                <h3><a href="/events/{{ $event->id }}" class="this_event no-highlight">{{ $event->event_name }}</a></h3>
            </div>

            <div class = "col-6 text-right">
                <div class="row">
                    <!-- Logistics -->
                    <h6 class="card-subtitle text-muted col-12"><span class="lnr lnr-calendar-full"></span> {{ printDate($event->starts) }}</h6>
                </div>
                <div class="row mt-2 mb-2">
                    <h6 class="card-subtitle text-muted col-12"><span class="lnr lnr-clock"></span></span> {{ printTime($event->starts) }} - {{ printTime($event->ends) }}</h6>
                </div>
                <div class="row">
                    <h6 class="card-subtitle text-muted col-12"><span class="lnr lnr-map-marker"></span>{{ $location->address }}, {{ $location->city }}, {{ $location->postal_code }}</h6>
                </div>
            </div>

        </div>

        <hr />

        <!-- Event Description -->
        <div class="card">
            <div class="card-block">
                <p class="card-text">{{ $event->event_description }}</p>
            </div>
        </div>

    </div>
</div>
