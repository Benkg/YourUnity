<?php $__env->startSection('page_title'); ?>
All Events
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">

            <?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->make('events.format.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php

                    $userId = Auth::user()->id;

                    //Select all this user's future events
                    $futureEvents = App\Event::where('user_id', $userId)
                                        ->where('time_state','=', 2)
                                        ->orderBy('starts', 'DESC')
                                        ->get();

                    //Select all this user's present events
                    $presentEvents = App\Event::where('user_id', $userId)
                                        ->where('time_state','=', 1)
                                        ->orderBy('starts', 'DESC')
                                        ->get();

                    //Select all this user's past events
                    $pastEvents = App\Event::where('user_id', $userId)
                                        ->where('time_state','=', 0)
                                        ->orderBy('starts', 'DESC')
                                        ->get();
                ?>

                <?php if(isset($futureEvents[0])): ?>
                    <?php echo '<br />
                        <div class="row">
                            <hr class="col-4"/><h3 class="text-center col-3">Future Events</h3><hr class="col-4"/>
                        </div>';
                    ?>
                    <?php $__currentLoopData = $futureEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($event->user->id == Auth::user()->id): ?>
                            <?php echo $__env->make('events.cards.event', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if(isset($presentEvents[0])): ?>
                    <?php echo '<br />
                        <div class="row">
                            <hr class="col-4"/><h3 class="text-center col-3">Current Events</h3><hr class="col-4"/>
                        </div>';
                    ?>
                    <?php $__currentLoopData = $presentEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($event->user->id == Auth::user()->id): ?>
                            <?php echo $__env->make('events.cards.event', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if(isset($pastEvents[0])): ?>
                    <?php echo '<br />
                        <div class="row">
                            <hr class="col-4"/><h3 class="text-center col-3">Past Events</h3><hr class="col-4"/>
                        </div>';
                    ?>
                    <?php $__currentLoopData = $pastEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($event->user->id == Auth::user()->id): ?>
                            <?php echo $__env->make('events.cards.event', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            <?php echo $__env->make('events.format.bottom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<style>
    footer {
        position: relative !important;
    }

    .bold {
        font-weight: 300 !important;
    }

    hr {
        margin-bottom: 2.5rem !important;
    }
</style>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>