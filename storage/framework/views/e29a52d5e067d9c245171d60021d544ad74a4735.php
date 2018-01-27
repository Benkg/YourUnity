<?php $__env->startSection('page_title'); ?>
Direct Contact | YourUnity
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Pass url to form submit, should be done using session reflash -->
<?php
    session()->flash('url', $url);
?>

<div id="contactContainer">
    <?php echo $__env->make('layouts.menu.contact', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="cont">
        <div class="cardContents">
            <!-- Directions -->
            <h3 class="">Contact Us Directly</h3>
            <hr />

            <!-- Report Form -->
            <form method="POST" action="/contact" class="col-10 col-centered">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                  <textarea class="form-control" name="contact" rows="4" placeholder="We will respond as soon as possible"></textarea>
              </div>
              <input type="hidden" name="type" value='0' />
              <button type="submit" class="btn btn-primary text-white float-right">Send</button>
            <form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>