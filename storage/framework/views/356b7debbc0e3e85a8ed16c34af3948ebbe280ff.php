<div class="card mt-4 mb-4">
    <div class="card-block">

        <div class="btn-group" data-toggle="anchors">

            <a href="/events/<?php echo e($event->id); ?>/duplicate" class="btn buttons">+</a>

            <a href="/events/<?php echo e($event->id); ?>/delete" class="btn buttons">-</a>

            <a href="/events/<?php echo e($event->id); ?>/edit" class="btn buttons">Edit</a>

        </div>

        <a href="/attachments/<?php echo e($event->id); ?>">
            <button class="btn btn-primary float-right text-size-large">+ Add Documents</button>
        </a>

    </div>
</div>


<style>
.buttons {
    background-color: transparent !important;
    color: #6bbaa7 !important;
    border: 2px solid #6bbaa7 !important; /* Green */
}

</style>
