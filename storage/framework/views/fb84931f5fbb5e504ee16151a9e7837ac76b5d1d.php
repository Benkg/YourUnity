<div class="card mt-4 mb-4">
    <div class="card-block col-12">
        <div class="row" data-toggle="anchors">
            <div class="col-6 center">
                <a href="/<?php echo e($org->company); ?>/events" class="btn buttons col-12">back</a>
            </div>

            <div class="col-6 center">
                <a href="/<?php echo e($org->company); ?>/<?php echo e($event->id); ?>/signin" class="btn buttons col-12">Sign-In</a>
            </div>
        </div>
    </div>
</div>


<style>
.buttons {
    background-color: transparent !important;
    color: #6bbaa7 !important;
    border: 2px solid #6bbaa7 !important; /* Green */
}

</style>
