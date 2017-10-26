                    <!-- Event Card -->
<div class="card mt-4 mb-4 p-3">
    <div class="card-block">

    {{ flashURL() }}

                        <!-- Event Name -->
        <div class="row">
            <div class="btn-group col-1">
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu ml-3">
                    {{ htmlEventDropDown($event) }}
                </div>
            </div>

            <div class = " col-11 text-right">
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

        <hr />
        <div class="row">
            <h3 class="col-12 text-center"><a href="/events/{{ $event->id }}" class="this_event no-highlight">{{ $event->event_name }}</a></h3>
        </div>

        <!-- Event Description -->
        <div class="card">
            <div class="card-block">
                <p class="card-text">{{ $event->event_description }}</p>
            </div>
        </div>

    </div>
</div>
