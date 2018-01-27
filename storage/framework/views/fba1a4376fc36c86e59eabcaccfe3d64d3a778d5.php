<!-- Event Card -->
<div class="cardContents mt-4 mb-4 p-3">
<div class="card-block">

<div class="row">

    <div class="col-6 text-left">
        <a href="/<?php echo e($org->company); ?>/<?php echo e($event->id); ?>" class="this_event no-highlight"><h3><?php echo e($event->event_name); ?></h3></a>
    </div>
    <div class="col-6 text-right">
        <a href="#" ><h2 class="green-text"><span class="lnr lnr-pencil "></span> Sign-in</h2></a>
    </div>
</div>

<hr />
<div class="row">

    <div class = "col-12 text-left">
        <div class="row">
            <!-- Logistics -->
            <h6 class="card-subtitle text-muted col-12"><span class="lnr lnr-calendar-full"></span> <?php echo e(printDate($event->starts)); ?></h6>
        </div>

        <div class="row mt-2 mb-2">
            <h6 class="card-subtitle text-muted col-12"><span class="lnr lnr-clock"></span></span> <?php echo e(printTime($event->starts)); ?> - <?php echo e(printTime($event->ends)); ?></h6>
        </div>

        <div class="row">
            <h6 class="card-subtitle text-muted col-12"><span class="lnr lnr-map-marker"></span><?php echo e($event->location); ?></h6>
        </div>

    </div>

</div>

</div>
</div>
