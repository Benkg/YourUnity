<!-- <div class="event"> -->
  <div class="card mt-4 mb-4 p-3">
    <div class="event">
        <a href="/events/{{ $event->id }}"><h3 class="blue mb-4">{{ $event->event_name }}</h3></a>
        <p>Created By: {{ $event->user->company }}</p>
        <p>Date: {{ $event->date }}</p>
        <p>Start Time: {{ $event->time_start }}</p>
        <p>Event Duration: {{ $event->duration }} hours</p>
        <p>Location: {{ $event->location }}</p>
        <p>Description: {{ $event->event_description }}</p>
        <p>Recurring:
            @if($event->recurring == 1)
                Yes
            @else
                No
            @endif
        </p>
      </div>
</div>
