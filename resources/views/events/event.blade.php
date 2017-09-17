                    <!-- Event Card -->
<div class="card mt-4 mb-4 p-3">
    <div class="card-block">

    {{ flashURL() }}

                        <!-- Event Name -->
        <div class="row">
            <div class="btn-group col-4">
                <button type="button" class="btn btn-secondary text-center ml-3"><a href="/events/{{ $event->id }}" class="no-highlight">{{ $event->event_name }}</a></button>
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu ml-3">
                    {{ htmlEventDropDown($event) }}
                </div>
            </div>

            <div class="col-8 text-right">
                <div class="row">
                    <!-- Logistics -->
                    <h6 class="card-subtitle text-muted col-12"><span class="lnr lnr-calendar-full"></span> {{ printDate($event->starts) }}</h6>
                </div>
                <div class="row mt-2">
                    <h6 class="card-subtitle text-muted col-12"><span class="lnr lnr-clock"></span></span> {{ printTime($event->starts) }} - {{ printTime($event->ends) }}</h6>
                </div>
            </div>

        </div>

        <!-- Event Logistics -->
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <h6 class="card-subtitle text-muted col-12"><span class="lnr lnr-map-marker"></span>{{ $event->location }}</h6>
                </div>
            </div>
        </div>

        <hr />

        <!-- Event Description -->
        <div class="card">
            <div class="card-block">
                <p class="card-text">Description</p>
                <p class="card-text">{{ $event->event_description }}</p>
            </div>
        </div>

    </div>
</div>
