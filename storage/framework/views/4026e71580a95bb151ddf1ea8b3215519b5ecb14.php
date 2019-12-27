<?php $__env->startSection('content'); ?>
<div class="container">
    <?php
        {{ $isAdmin = Auth::user()->role_id == 1 ? true : false; }}
    ?>
    <!-- Small boxes (Stat box) -->
    <?php if($isAdmin === true): ?>
        <!-- admin panel -->
        <div class="row">
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?php echo e($users_count); ?>

                        </h3>
                        <p>
                            Users/Wokers
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/more/0" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            <?php echo e($profiles_count); ?>

                        </h3>
                        <p>
                            Profile Datas
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="/more/1" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?php echo e($offers_count); ?>

                        </h3>
                        <p>
                            IP Datas
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="/more/2" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->
    <?php else: ?>
        <!-- user panel -->
        <div class="row">
            <div class="col-lg-3 col-xs-3"></div><!-- ./col -->
            <div class="col-lg-3 col-xs-3">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            <?php echo e($profiles_count); ?>

                        </h3>
                        <p>
                            Profile Datas
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="/more/1" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-3">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?php echo e($offers_count); ?>

                        </h3>
                        <p>
                            IP Datas
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="/more/2" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-3"></div><!-- ./col -->
        </div><!-- /.row -->
    <?php endif; ?>
    <?php if($url != 'dashboard'): ?>
        <?php if(isset($users)): ?>
            <div class="row" style="height: 90px">
                <h1>
                    User/Worker Management
                    <a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary" style="float: right">Add +</a>
                </h1>
            </div>
            <!-- top row -->
            <div class="row">
                <div class="col-xs-12 connectedSortable">
                    <div class="box">
                        <div class="box-body table-responsive">
                            <table id="DataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Fullname</th>
                                        <th>Phone</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        {{ $i=0; }}
                                    ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php  {{$i++;}} ?>
                                    <tr id="Row-<?php echo e($i); ?>">
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e($row['username']); ?></td>
                                        <td><?php echo e($row['email']); ?></td>
                                        <td><?php echo e($row['fullname']); ?></td>
                                        <td><?php echo e($row['phone']); ?></td>
                                        <td style="text-align: center">
                                            <a href="<?php echo e(route('user.show', $row['id'])); ?>" class="btn btn-warning"><i class="fa fa-eye"></i></a></td>
                                        <td style="text-align: center"><a href="<?php echo e(route('user.edit', $row['id'])); ?>" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                                        <td style="text-align: center"><form action="<?php echo e(route('user.destroy', $row['id'])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-times"></i></button>
                                            </form></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
            <!-- /.row -->
        <?php elseif(isset($profiles)): ?>
            <div class="row" style="height: 90px">
                <h1>
                    Profile_data Management
                    <a href="<?php echo e(route('profile.create')); ?>" class="btn btn-primary" style="float: right">Add +</a>
                </h1>
            </div>
            <!-- top row -->
            <div class="row">
                <div class="col-xs-12 connectedSortable">
                    <div class="box">
                        <div class="box-body table-responsive">
                            <table id="DataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email Address</th>
                                        <th>Birthday</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>Zip Code</th>
                                        <th>Phone</th>
                                        <th>Created By</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <?php if($isAdmin === true): ?>
                                            <th>Delete</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        {{ $i=0; }}
                                    ?>
                                    <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php {{$i++;}} ?>
                                    <tr id="Row-<?php echo e($i); ?>">
                                        <td><a href="<?php echo e(route('profile.find', $row['id'])); ?>"><?php echo e($row['id']); ?></a></td>
                                        <td><?php echo e($row['name']); ?></td>
                                        <td><?php echo e($row['username']); ?></td>
                                        <td><?php echo e($row['email_address']); ?></td>
                                        <td><?php echo e($row['birthday']); ?></td>
                                        <td><?php echo e($row['address']); ?></td>
                                        <td><?php echo e($row['city']); ?></td>
                                        <td><?php echo e($row['state']); ?></td>
                                        <td><?php echo e($row['country']); ?></td>
                                        <td><?php echo e($row['zip_code']); ?></td>
                                        <td><?php echo e($row['phone']); ?></td>
                                        <td><?php echo e($row['created_by']); ?></td>
                                        <td style="text-align: center"><a href="<?php echo e(route('profile.show', $row['id'] )); ?>" class="btn btn-warning"><i class="fa fa-eye"></i></a></td>
                                        <td style="text-align: center"><a href="<?php echo e(route('profile.edit', $row['id'])); ?>" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                                        <?php if($isAdmin === true): ?>
                                            <td style="text-align: center"><form action="<?php echo e(route('profile.destroy', $row['id'])); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-danger" type="submit"><i class="fa fa-times"></i></button>
                                                </form></td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
            <!-- /.row -->
        <?php else: ?>
            <div class="row" style="height: 90px">
                <h1>
                    IP_data Management
                    <a href="<?php echo e(route('offer.create')); ?>" class="btn btn-primary" style="float: right">Add +</a>
                </h1>
            </div>
            <!-- top row -->
            <div class="row">
                <div class="col-xs-12 connectedSortable">
                    <div class="box">
                        <div class="box-body table-responsive">
                            <table id="DataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Offer Name</th>
                                        <th>Offer Link</th>
                                        <th>IP</th>
                                        <th>User Agent</th>
                                        <th>Screen Resolution</th>
                                        <th>Created By</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <?php if($isAdmin === true): ?>
                                            <th>Delete</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        {{ $i=0; }}
                                    ?>
                                    <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php  {{$i++;}} ?>
                                    <tr id="Row-<?php echo e($i); ?>">
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e($row['offer_name']); ?></td>
                                        <td><?php echo e($row['offer_link']); ?></td>
                                        <td><?php echo e($row['ip']); ?></td>
                                        <td><?php echo e($row['user_agent']); ?></td>
                                        <td><?php echo e($row['screen_resolution']); ?></td>
                                        <td><?php echo e($row['created_by']); ?></td>
                                        <td style="text-align: center"><a href="<?php echo e(route('offer.show', $row['id'] )); ?>" class="btn btn-warning"><i class="fa fa-eye"></i></a></td>
                                        <td style="text-align: center"><a href="<?php echo e(route('offer.edit', $row['id'])); ?>" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                                        <?php if($isAdmin === true): ?>
                                            <td style="text-align: center"><form action="<?php echo e(route('offer.destroy', $row['id'])); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-danger" type="submit"><i class="fa fa-times"></i></button>
                                                </form></td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
            <!-- /.row -->
        <?php endif; ?>
    <?php endif; ?>
</div>

<script>
    $("#DataTable").dataTable();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>