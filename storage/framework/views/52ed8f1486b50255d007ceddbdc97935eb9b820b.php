<?php $__env->startSection('page_title'); ?>
All Events
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startSection('content'); ?>

<!-- Main Content -->
<div class="full-content">
<div class="container-fluid">
        <div class="row">

            <div class="col-6 card middle center">
                <h1 class="uhoh">!</h1>
                <h2>Whoops! Looks like the url you typed doesn't exist!</h2>
            </div>

        </div>
</div>
</div>

<?php $__env->stopSection(); ?>

<style>
    .uhoh {
        position: relative;
        top: 0;
        left: 0;
        color: #6bbaa7;
        font-weight: 800 !important;
        font-size: 4rem !important;
        margin-bottom: 3vh;
    }

    .middle {
        margin: 10vh auto;
        padding: 5%;
    }
</style>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>