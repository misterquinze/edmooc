<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @yield('tab-title')

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ URL('template/1/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL('template/1/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL('template/1/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL('template/1/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ URL('template/1/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ URL('template/1/bower_components/morris.js/morris.css') }}">
    <link rel="stylesheet" href="{{ URL('template/1/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ URL('template/1/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL('template/1/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ URL('template/1/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <a href="index2.html" class="logo">
                <span class="logo-mini"><b>A</b>LT</span>
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>

            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                                page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i> 5 new members joined
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                            
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        Alexander Pierce - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    
        <aside class="main-sidebar">
            <section class="sidebar">

                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ URL('template/1/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Alexander Pierce</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU UTAMA</li>
                    @yield('menu')
                    <li class="header">DAFTAR KURSUS</li>
                    <li><a href="{{ URL('course') }}"><i class="fa fa-book"></i> <span>Katalog</span></a></li>
                </ul>
            </section>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>
                Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.
            </strong> 
            All rights reserved.
        </footer>

    </div>

    <script src="{{ URL('template/1/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL('template/1/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{ URL('template/1/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL('template/1/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ URL('template/1/bower_components/morris.js/morris.min.js') }}"></script>
    <script src="{{ URL('template/1/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <script src="{{ URL('template/1/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ URL('template/1/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ URL('template/1/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <script src="{{ URL('template/1/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ URL('template/1/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ URL('template/1/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL('template/1/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ URL('template/1/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL('template/1/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ URL('template/1/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ URL('template/1/dist/js/pages/dashboard.js') }}"></script>
</body>
</html>
