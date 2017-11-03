<!-- Create Event Form -->
<div class="card mb-4 p-3">
    <div class="card-block">

        <h1 class="white text-center">Delete Event</h1>
        <hr class="col-11"/>

        <div class="text-center">

            <h3 class="card-title">Are you sure you want to delete this event?</h3>

            <form method="POST" action="/events/{{ $event->id }}/delete">
                {{ csrf_field() }}

                <!-- Cancle and Delete Buttons -->
                <a href="/events/{{ $event->id }}" class="float-left">Cancel</a>
                <button type="submit" class="text-white btn btn-danger float-right">Delete</button>

            </form>

        </div>

    </div>
</div>
