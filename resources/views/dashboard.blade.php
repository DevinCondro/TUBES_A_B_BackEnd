<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initialscale=1">
        <title>Hotel Atma Jaya</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,
700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white
            navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"
role="button">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="navbar-search"
                        href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control formcontrol-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar"
                                    type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar"
                                type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen"
                href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
            </a>
            </li>
            </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: navy">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src=" data:image/png;base64,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"
        alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">Hotel Atma Jaya</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="http://logo.uajy.ac.id/file/uploads/2021/08/UAJY-LOGOGRAM_-01.png"
                    class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Kelompok B</a>
                </div>
            </div>
            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebarsearch">
                    <input class="form-control form-controlsidebar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
    <button class="btn btn-sidebar">
        <i class="fas fa-search fa-fw"></i>
    </button>
</div>
</div>
</div>
<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column"
    data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="{{ url('kamar') }}"
        class="nav-link">
        <i class="nav-icon far fa-plus-square"></i>
        <p> Booking Kamar</p>
    </a>
</li>
</ul>
</nav>

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column"
    data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="{{ url('makanan') }}"
        class="nav-link">
        <i class="nav-icon fa fa-cutlery"></i>
        <p> Pemesanan Makanan</p>
    </a>
</li>
</ul>
</nav>

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column"
    data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="{{ url('golongan') }}"
        class="nav-link">
        <i class="nav-icon far fa-circle"></i>
        <p> Pemesanan Ballroom</p>
    </a>
</li>
</ul>
</nav>

<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @yield('content')
</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline"> 200710729_Chrystian Devin Condro
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{ date('Y') }} <a
        href="#">AdminLTE.io</a>. </strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/js/bootstrap.bundle.min.js')
}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>
</html>
