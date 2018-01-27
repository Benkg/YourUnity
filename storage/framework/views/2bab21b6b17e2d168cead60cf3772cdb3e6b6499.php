<?php $__env->startSection('page_title'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php
    $nonPastEvents = getNonPastEvents();
    $numEvents = sizeof($nonPastEvents);
?>
                    <!-- Header (top bar with logo and settings) -->
<div class="container-fluid">
    <div class="row">

                    <!-- Sidebar -->
        <?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Padding for fixed sidebar -->
        <div class="col-3"></div>

                    <!-- Stats Bar and Events List -->
        <div class="col-9 pl-5 pr-5 pt-4 dashboard">
            <div class="row mt-4">

                <!-- Stats Bar -->
                <?php echo $__env->make('cards.stats', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <h3 class="thicc">Upcoming Events</h3>

                    <br />

                    <?php if($numEvents == 0): ?>
                        <h4 class="italic">You have no upcoming events.</h4>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <!-- start a count var -->
                <?php $count = 1; ?>

                <?php $__currentLoopData = $nonPastEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($event->time_state == 2): ?>

                    <div class="col-4 mt-4">

                    <a href="/events/<?php echo e($event->id); ?>" class="white">   
                        <div class="card small-event">
                            <div class="card-header card-inverse center" style="background-color: #6bbaa7; color: #fff !important;">                       
                                    <h5><?php echo e($event->event_name); ?></h5>
                            </div>

                            <div class="card-block">
                                <span>
                                    <span class="lnr lnr-calendar-full"></span> <?php echo printDate($event->starts) ?> 
                                    (<?php
                                        $time = timeUntil($event->starts);
                                        echo secsToTimeShort($time);
                                        echo " days)";
                                    ?>  
                                </span>
                                <br />
                                <span><span class="lnr lnr-clock"></span> <?php echo printTime($event->starts) ?> - <?php echo printTime($event->ends) ?></span>
                                <br />
                                <span>
                                    <?php if($event->num_registered == 1): ?>
                                        <?php echo e($event->num_registered); ?> person has registered
                                    <?php endif; ?>

                                    <?php if($event->num_registered > 1): ?>
                                        <?php echo e($event->num_registered); ?> people have registered
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div> 
                    </a>

                    </div>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>