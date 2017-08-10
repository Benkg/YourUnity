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
                    <a href="/events/{{ $event->id }}/edit" class="dropdown-item">Edit</a>
                    <a href="/events/{{ $event->id }}/duplicate" class="dropdown-item" href="#">Duplicate +</a>
                    <a href="/feedback/eventOptions" class="dropdown-item">More Options</a>
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

        <!-- Event Logistics and Requirements -->
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

                <!-- Event Requirements -->

        @if ( $event->event_requirements )
            <div class="card">
                <div class="card-block">
                    <p class="card-text">Requirements</p>
                    <p class="card-text">{{ $event->event_requirements }}</p>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-block">
                    <p class="card-text text-center text-muted">(This event has no requirements)</p>
                </div>
            </div>
        @endif

    </div>
</div>
