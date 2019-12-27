<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo e(config('app.name')); ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo e(url('/AdminLTE/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo e(url('/AdminLTE/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo e(url('/AdminLTE/css/ionicons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo e(url('/AdminLTE/css/jvectormap/jquery-jvectormap-1.2.2.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="<?php echo e(url('/AdminLTE/css/fullcalendar/fullcalendar.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo e(url('/AdminLTE/css/daterangepicker/daterangepicker-bs3.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo e(url('/AdminLTE/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo e(url('/AdminLTE/css/AdminLTE.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?php echo e(url('/AdminLTE/js/jquery-ui-1.10.3.min.js')); ?>" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo e(url('/AdminLTE/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo e(url('/AdminLTE/js/plugins/sparkline/jquery.sparkline.min.js')); ?>" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo e(url('/AdminLTE/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('/AdminLTE/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="<?php echo e(url('/AdminLTE/js/plugins/fullcalendar/fullcalendar.min.js')); ?>" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo e(url('/AdminLTE/js/plugins/jqueryKnob/jquery.knob.js')); ?>" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo e(url('/AdminLTE/js/plugins/daterangepicker/daterangepicker.js')); ?>" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo e(url('/AdminLTE/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo e(url('/AdminLTE/js/plugins/iCheck/icheck.min.js')); ?>" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo e(url('/AdminLTE/js/AdminLTE/app.js')); ?>" type="text/javascript"></script> 

    </head>
    <body class="skin-black">
        <?php
            $isAdmin = Auth::user()->role_id == 1 ? true : false;
        ?>
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <?php echo e(config('app.name')); ?>

            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo e(Auth::user()->fullname); ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo e(url('/AdminLTE/img/avatar3.png')); ?> " class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo e(Auth::user()->fullname); ?> - <?php if(Auth::user()->role_id == 1): ?> Administrator <?php else: ?> User <?php endif; ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Sign out')); ?>

                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo e(url('AdminLTE/img/avatar3.png')); ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo e(Auth::user()->username); ?></p>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="<?php if($url == 'dashboard'): ?> active <?php endif; ?>">
                            <a href="<?php echo e(url('/')); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <?php if($isAdmin === true): ?>
                        <li class="<?php if($url == 'users'): ?> active <?php endif; ?>">
                            <a href="<?php echo e(url('more/0')); ?>">
                                <i class="fa fa-users"></i> <span>Users</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="<?php if($url == 'profiles'): ?> active <?php endif; ?>">
                            <a href="<?php echo e(url('more/1')); ?>">
                                <i class="fa fa-table"></i> <span>Profile Data</span>
                            </a>
                        </li>
                        <li class="<?php if($url == 'offers'): ?> active <?php endif; ?>">
                            <a href="<?php echo e(url('more/2')); ?>">
                                <i class="fa fa-envelope"></i> <span>IP Data</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Main content -->
                <section class="content">
                    <?php echo $__env->yieldContent('content'); ?>
                </section><!-- /.content -->
            </aside>
        </div>
    </body>
</html>