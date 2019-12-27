<?php $__env->startSection('content'); ?>
<div class="container">
    <form action="<?php echo e(route('profile.store')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <div class="row">
            <h5 class="title" id="exampleModalLabel">Add Profile</h5>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email_address" placeholder="Email Address">
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="text" class="form-control" name="birthday" placeholder="Birthday">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" placeholder="Address">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="text" class="form-control" name="city" placeholder="City">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="state" placeholder="State">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="text" class="form-control" name="country" placeholder="Country">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="zip_code" placeholder="Zip Code">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" placeholder="Phone Number">
            </div>
        </div>
        <div class="row footer" style="text-align: center">
            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary btn-success">Back</a>
            <input type="button" class="btn btn-primary" id="add" value="Add">
        </div>
    </form>
</div>

<script>
    $('#add').click(function(){
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