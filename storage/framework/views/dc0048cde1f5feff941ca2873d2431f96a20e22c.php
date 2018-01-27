<?php $__env->startSection('page_title'); ?>
Test
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="contactContainer">
    <?php echo $__env->make('layouts.menu.public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="cont">
        <div class="cardContents">
            <a href="/<?php echo e($org->company); ?>">
                <h1 class="mt-2" style="color:white"> <?php echo e($org->company); ?> </h1>
            </a>
        </div>
        
        <div class="cardContents">
            <div class="row pt-2">
                <div class="col-12">
                    <h2 class="text-left"> Upcoming Events: </h2>
                </div>
            </div>
        </div>

        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('public.cards.mEventShort', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<style>
.buttons {
    background-color: transparent !important;
    color: #6bbaa7 !important;
    border: 2px solid #6bbaa7 !important; /* Green */
}

</style>

<!--
<div class="container-fluid">
    <div class="row">

        <h1 class="org"><?php echo e($org->company); ?></h1>
        <div class="eventCard"></div>
        <div class="signInForm"></div>

    </div>
</div>
-->

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>