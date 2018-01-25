<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="login-card">
                <p class="card-text text-center">To register, please enter your unique access code</p>
                <hr />
                <br />

                      <!-- Login Form -->
                    <form class="form-horizontal col-8 col-centered" role="form" method="POST" action="/access">
                        <?php echo e(csrf_field()); ?>


                      <div class="form-group">
                          <input type="text" class="form-control" placeholder="Enter Access Code" name="code"></input>
                      </div>

                      <!-- Back and Submit Buttons -->
                      <a class="btn" href="/">
                          Back
                      </a>
                      <button type="submit" class="btn btn-primary float-right">
                          Access
                      </button>


                    </form>
            </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<style>

.col-centered {
    margin: 0 auto;
}

</style>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>