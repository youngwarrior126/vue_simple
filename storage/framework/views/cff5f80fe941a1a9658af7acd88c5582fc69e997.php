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
    <form action="<?php echo e(route('user.update', $user->id)); ?>" method="post">
        <?php echo method_field('PATCH'); ?>
        <?php echo csrf_field(); ?>
        <div class="row">
            <h5 class="title" id="exampleModalLabel">Edit User</h5>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                UserName
                <input type="text" class="form-control" name="username" value="<?php echo e($user->username); ?>">
            </div>
            <div class="col-sm-6">
                Email Address
                <input type="text" class="form-control" name="email_address" value="<?php echo e($user->email); ?>">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                Passsword
                <input type="password" class="form-control" name="password" value="">
            </div>
            <div class="col-sm-6">
                Full Name
                <input type="text" class="form-control" name="fullname" value="<?php echo e($user->fullname); ?>">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                Phone Number
                <input type="text" class="form-control" name="phone" value="<?php echo e($user->phone); ?>">
            </div>
            <div class="col-sm-6">
                Role ID
                <input type="text" class="form-control" name="role_id" value="<?php echo e($user->role_id); ?>">
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
        if ($(":password").val() == ""){
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