<?php $__env->startSection('page_title'); ?>
Contact YourUnity
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.menu.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Pass url to form submit, should be done using session reflash -->
<?php
    session()->flash('url', $url);
?>

<div id="contactContainer">
    <div class="cont">
        <ul class="contactOptions">
            <li><a href="/contact/direct">Contact us Directly</a></li>
            <li><a href="/contact/feedback">Leave Feedback</a></li>
            <li><a href="/contact/report">Report an Issue</a></li>
        </ul>
    </div>
</div>

<style>
    .contactOptions {
        list-style-type: none;
        padding: 0;
        width: 100%;
        height: 100%;
    }

    .contactOptions li:hover {
        border: 0 !important;
        background-color: #282828;
    }

    .contactOptions > li > a {
        display: table-cell;
        text-decoration: none;
        text-decoration-color: white !important;
        font-size: 2rem;
        vertical-align: middle;
        color: #eee !important;
    }

    .contactOptions > li > a:hover {
        color: #6bbaa7 !important;
    }

    .contactOptions > li {
        display: table;
        text-align: center;
        text-decoration: none;

        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
        background-color: #2d2d2d;

        border-radius: 6px;
        width: 70vw;
        height: 15vh;
        margin: 5vh auto;
    }

    @media  only screen and (max-width : 1224px) {
        .contactOptions > li {
            width: 90vw;
            margin: 5vh auto;
        }
    }

</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>