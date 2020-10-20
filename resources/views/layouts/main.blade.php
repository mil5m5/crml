<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')| crm.codetitans.org </title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" class="nav-link text-style">
                    Home
                </a>
            </li>
        </ul>

    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="" class="nav-link text-style">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('client.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Client
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('client-source.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Client Source
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('currency.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                Currency
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('currency-exchange.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                Currency Exchanges
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Employee
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee-project.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Employee Project
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employee-salary-change.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Employee Salary Changes
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('income.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-sort-amount-down-alt"></i>
                            <p>
                                Income
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('outcome.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-sort-amount-up-alt"></i>
                            <p>
                                Outcome
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('outcome-type.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Outcome Type
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('position.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-vote-yea"></i>
                            <p>
                                Position
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('project.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-project-diagram"></i>
                            <p>
                                Project
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('project-credential.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-project-diagram"></i>
                            <p>
                                Project Credential
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('project-credential-type.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-project-diagram"></i>
                            <p>
                                Project Credential Type
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('project-rate-change.index') }}" class="nav-link text-style">
                            <i class="nav-icon fas fa-exchange-alt"></i>
                            <p>
                                Project Rate Changes
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper p-3">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

    <script src="{{ asset('js/date-widget.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
</div>
</body>
</html>
