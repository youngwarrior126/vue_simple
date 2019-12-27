<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<div class="container">
    <form action="<?php echo e(route('offer.update', $offer->id)); ?>" method="post">
        <?php echo method_field('PATCH'); ?>
        <?php echo csrf_field(); ?>
        <div class="row">
            <h5 class="title" id="exampleModalLabel">Edit Offer</h5>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                Offer Name<input type="text" class="form-control" name="offer_name" value="<?php echo e($offer->offer_name); ?>">
            </div>
            <div class="col-sm-6">
                Offer Link<input type="text" class="form-control" name="offer_link" value="<?php echo e($offer->offer_link); ?>">
            </div>
        </div>
        <div class="row form-group">
            <!-- <div class="col-sm-6">
                IP<input type="text" class="form-control" name="ip" value="<?php echo e($offer->ip); ?>">
            </div> -->
            <div class="col-sm-6">
                User Agent<input type="text" class="form-control" name="user_agent" value="<?php echo e($offer->user_agent); ?>">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                Screen Resolution<input type="text" class="form-control" name="screen_resolution" value="<?php echo e($offer->screen_resolution); ?>">
            </div>
            <div class="col-sm-6">
                Profile Data ID<input type="text" class="form-control" name="profile_data_id" value="<?php echo e($offer->profile_data_id); ?>">
            </div>
        </div>
        <div class="row footer" style="text-align: center">
            <?php if($errors->any() === true): ?>
                <a href="javascript: history.go(-2);" class="btn btn-primary btn-success">Back</a>
            <?php else: ?>
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary btn-success">Back</a>
            <?php endif; ?>
            <input type="button" class="btn btn-primary" id="update" value="Update">
        </div>
    </form>
</div>

<script>
    $('#update').click(function(){
        var error = 0;
        $(":text").each(function(){
            if ($(this).val() == "") {
                error = 1;
            }
        });
        if ($(":password") == ""){
            error = 1;
        }
        if (error == 0)
            $("form").submit();
        else
            alert('Input Datas!');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>