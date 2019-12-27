<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="row">
            Username : <?php echo e($user->username); ?></div>
        <div class="row">
            Email Address : <?php echo e($user->email); ?></div>
        <div class="row">
            Full Name : <?php echo e($user->fullname); ?></div>
        <div class="row">
            Phone : <?php echo e($user->phone); ?></div>
        <div class="row">
            Role : <?php echo e($user->role_id); ?></div>
        <div class="row" style="margin-left: 30px">
            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary btn-success">Back</a>
    </div><!-- /.row -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>