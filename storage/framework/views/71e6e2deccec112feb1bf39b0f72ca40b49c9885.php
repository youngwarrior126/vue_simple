<?php $__env->startSection('content'); ?>
<div class="container">
    <form action="<?php echo e(route('offer.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row">
            <h5 class="title" id="exampleModalLabel">Add Offer</h5>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="text" class="form-control validation" name="offer_name" placeholder="Offer Name">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="offer_link" placeholder="Offer Link">
            </div>
        </div>
        <div class="row form-group">
            <!-- <div class="col-sm-6">
                <input type="text" class="form-control" name="ip" placeholder="IP">
            </div> -->
            <div class="col-sm-6">
                <input type="text" class="form-control" name="user_agent" placeholder="User Agent">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="text" class="form-control" name="screen_resolution" placeholder="Screen Resolution">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="profile_data_id" placeholder="Profile Data ID">
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
        if (error == 0)
            $("form").submit();
        else
            alert('Input Datas!');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>