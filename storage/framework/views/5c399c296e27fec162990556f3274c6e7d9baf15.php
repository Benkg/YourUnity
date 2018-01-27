<?php $__env->startSection('page_title'); ?>
<?php echo e($event->event_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">

            <?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->make('events.format.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo $__env->make('events.cards.buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('events.cards.event', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('events.cards.attendeeList', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->make('events.format.bottom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<style>
    body {
        background: #3f3f3f !important;
        font-weight: 200;
    }

    footer {
        position: relative !important;
    }

    .black-background {
        background: #2e2e2e; /* Old Browsers */
        background: -webkit-linear-gradient(top,#2e2e2e,#3f3f3f); /*Safari 5.1-6*/
        background: -o-linear-gradient(top,#2e2e2e,#3f3f3f); /*Opera 11.1-12*/
        background: -moz-linear-gradient(top,#2e2e2e,#3f3f3f); /*Fx 3.6-15*/
        background: linear-gradient(to bottom, #2e2e2e, #3f3f3f); /*Standard*/
    }

    .logo {
        width: 10em;
    }
</style>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>