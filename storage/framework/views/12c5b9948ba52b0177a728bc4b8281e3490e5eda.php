<?php $__env->startSection('page_title'); ?>
<?php echo e($org->company); ?> Test
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="contactContainer">
    <?php echo $__env->make('layouts.menu.public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <!--TODO: Default CSS shouldn't be in here-->
    <div class="cont">
        <div class="cardContents">
            <h1 class="mt-2"> <?php echo e($org->company); ?> </h1>
        </div>

        <div class="cardContents">
            <div class="row pt-2">
                <div class = "col-6">
                    <a href="/<?php echo e($org->company); ?>/events">
                        <span class="lnr lnr-layers"></span>
                        All Events
                    </a>
                </div>
                <div class = "col-6">
                    <a href="#">
                        <span class="lnr lnr-pencil"></span>
                        Sign-in
                    </a>
                </div>
            </div>
        </div>

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