<?php $__env->startComponent('mail::message'); ?>
# YourUnity

Hello, <?php echo e($user->name); ?>


Thank you for registering with YourUnity!

<?php $__env->startComponent('mail::button', ['url' => 'https://yourunity.org/dashboard']); ?>
Go to YourUnity
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
YourUnity Team
<?php echo $__env->renderComponent(); ?>
