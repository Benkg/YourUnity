<?php $__env->startSection('page_title'); ?>
Settings
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="edit-card">
                <h2 class="mb-4"><?php echo e(Auth::user()->company); ?></h2>
                <form class="" method = "POST" action = "/settings/edit">
                    <?php echo e(csrf_field()); ?>

                    <h4 class="mb-3">Event Coordinator: </h4>
                    <input class="form-control col-8 mb-3" type ='text' name ='name' id='name' value ="<?php echo e(Auth::user()->name); ?>"/>
                    <h4 class="mb-3">Email: </h4>
                    <input class="form-control col-8 mb-3" type ='text' name ='email' id='email' value ="<?php echo e(Auth::user()->email); ?>"/>
                    <input class="btn btn-primary" type = 'submit' value = "Update" />
                </form>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>