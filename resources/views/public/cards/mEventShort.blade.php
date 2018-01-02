<!-- Event Card -->
<div class="cardContents mt-4 mb-4 p-3">
<div class="card-block">

<div class="row">

    <div class="col-12 text-left">
        <h3><a href="/{{ $org->company }}/{{ $event->id }}" class="this_event no-highlight">{{ $event->event_name }}</a></h3>
    </div>
</div>

<hr />
<div class="row">

    <div class = "col-12 text-left">
        <div class="row">
            <!-- Logistics -->
            <h6 class="card-subtitle text-muted col-12"><span class="lnr lnr-calendar-full"></span> {{ printDate($event->starts) }}</h6>
        </div>

        <div class="row mt-2 mb-2">
            <h6 class="card-subtitle text-muted col-12"><span class="lnr lnr-clock"></span></span> {{ printTime($event->starts) }} - {{ printTime($event->ends) }}</h6>
        </div>

        <div class="row">
            <h6 class="card-subtitle text-muted col-12"><span class="lnr lnr-map-marker"></span>{{ $event->location }}</h6>
        </div>

    </div>

</div>

</div>
</div>
