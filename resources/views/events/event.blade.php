                    <!-- Event Card -->
<div class="card mt-4 mb-4 p-3">
    <div class="card-block">

                        <!-- Event Name -->
        <div class="row">
            <h4 class=" card-title col-9">{{ $event->event_name }}</h4>
            <a href="/events/{{ $event->id }}/edit" class="card-link col-3 text-right">Edit</a>
        </div>

                        <!-- Event Description -->
        <div class="card mb-2 text-center">
            <div class="card-block">
                <p class="card-text text-center">{{ $event->event_description }}</p>
              </div>
        </div>

                        <!-- Event Logistics and Requirements -->
        <div class="card">
            <div class="card-block">
                <div class="row">

                            <!-- Logistics -->
                    <div class="col-6">
                        <p class="card-text mb-2 text-muted">Logistics:</p>
                        <h6 class="card-subtitle mb-2 text-muted">Hosted by {{ $event->user->company }} on {{ $event->date }}. @if($event->recurring == 1) (Recurring) @endif</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Start Time: {{ $event->time_start }}. Duration: {{ $event->duration }} hrs.</h6>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $event->location }}</h6>
                    </div>

                            <!-- Requirements -->
                    <div class="col-6">
                        <p class="card-text mb-2 text-muted">Requirements: </p>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
