<?php $__env->startSection('page_title'); ?>
Edit Event
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">

            <!-- SideBar -->
            <?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- Errors Banner -->
            <?php echo $__env->make('events.format.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('events.cards.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('events.format.bottom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- Edit Form -->
            <?php echo $__env->make('events.format.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('events.forms.editF', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('events.format.bottom', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

                    <!-- Custom Styles -->
<style>
body {
  background: #3f3f3f !important;
  font-weight: 200;
}

label {
    color: #fff;
}

.col-centered {
    margin: 0 auto;
}

.white {
    color: #fff;
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

.event {
    background: #2e2e2e;
    border: 0px;
    opacity: 0.7;
    color: #fff;
    width: 100%;
    border-radius: 5px;
}

.btn-primary {
    background-color: #6bbaa7 !important;
    border: 1px solid #6bbaa7 !important;
}

button:hover {
    cursor: pointer;
}
</style>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>