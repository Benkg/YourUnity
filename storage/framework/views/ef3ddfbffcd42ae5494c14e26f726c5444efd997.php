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
        <?php echo $__env->make('public.cards.buttons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('public.cards.mEventLong', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>