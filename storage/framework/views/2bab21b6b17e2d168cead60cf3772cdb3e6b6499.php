<?php $__env->startSection('page_title'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php
    $nonPastEvents = getNonPastEvents();
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
            <div class="row">

                        <!-- Stats Bar -->
                <?php echo $__env->make('cards.stats', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>