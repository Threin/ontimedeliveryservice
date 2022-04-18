<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>On-Time Delivery Admin</title>
 <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
   <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('lte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
   <!-- summernote -->
  <link rel="stylesheet" href="{{asset('lte/plugins/summernote/summernote-bs4.min.css')}}">

   <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" media="print" href="{{ asset('css/print_media.css') }}" >
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}" >






    {{-- @stack('styles') --}}

  @yield('assets')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">
      {{-- @php
        $img = 'storage/'. Auth::user()->avatar;
      @endphp --}}
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{asset('lte/dist/img/otd_logo_final.png')}}" alt="On-Time Delivery Admin" height="60" width="60">
    </div>
    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="navbar-brand" href="#">
            <img src="{{asset('lte/dist/img/otd_logo_final.png')}}" alt="On-Time Delivery Admin" width="30" height="30">
            {{ config('app.name', 'On-time Delivery Admin') }}
        </a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
         <!-- Notifications Dropdown Menu -->
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link">
                Welcome, {{ Auth::user()->name }}
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-power-off mr-2"></i> {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
  </nav>


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-focused" >
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="{{asset('lte/dist/img/otd_logo_final.png')}}" alt="OnTimeDelivery" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">On-time Delivery Admin</span>
      </a>

       <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-column align-items-center">
        <div class="image d-flex justify-content-center">
          {{-- <img src="https://via.placeholder.com/150x150.jpg" class="img-circle elevation-2 w-50" alt="User Image"> --}}
          <img src="#" class="img-circle elevation-2 w-50" alt="User Image">

        </div>
        <div class="info d-flex flex-column align-items-center">
          <a href="#" class="d-block"> {{ Auth::user()->name }} </a>

          <a class="text-muted text-sm" href="#"><i class="fas fa-circle text-success"></i>  {{ Auth::user()->name }}</a>

        </div>
      </div>

      <!-- Sidebar -->
      <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{ Route::currentRouteNamed( 'admin.dashboard' ) ?  'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                    </a>

                </li>
                @can('isAdmin')
                <li></li>
                <li class="nav-item {{ Route::currentRouteNamed( 'admin.users.index' ) ?  'menu-open' : '' }}
                {{ Route::currentRouteNamed( 'admin.users.create' ) ?  'menu-open' : '' }}
                {{ Route::currentRouteNamed( 'admin.users.edit' ) ?  'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::currentRouteNamed( 'admin.users.index' ) ?  'active' : '' }}
                    {{ Route::currentRouteNamed( 'admin.users.create' ) ?  'active' : '' }}
                    {{ Route::currentRouteNamed( 'admin.users.edit' ) ?  'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        User Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item ">
                                <a href="{{route('admin.users.index')}}" class="nav-link {{ Route::currentRouteNamed( 'admin.users.index' ) ?  'active' : '' }}">
                                <i class="far fa-user nav-icon ml-2"></i>
                                <p> Active Users</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('admin.users.create')}}" class="nav-link {{ Route::currentRouteNamed( 'admin.users.create' ) ?  'active' : '' }}">
                                <i class="far fa-user nav-icon ml-2"></i>
                                <p>Add User</p>
                                </a>
                            </li>
                        </ul>
                </li>
                @endcan

                <li class="nav-item {{ Route::currentRouteNamed( 'permits.in-transit' ) ?  'menu-open' : '' }}
                                    {{ Route::currentRouteNamed( 'permits.delivered' ) ?  'menu-open' : '' }}
                                    {{ Route::currentRouteNamed( 'permits.printed' ) ?  'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::currentRouteNamed( 'permits.in-transit' ) ?  'active' : '' }}
                                                {{ Route::currentRouteNamed( 'permits.delivered' ) ?  'active' : '' }}
                                                {{ Route::currentRouteNamed( 'permits.printed' ) ?  'active' : '' }}">
                    <i class="nav-icon  fas fa-file"></i>
                    <p>
                        Permit Monitoring
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item ">
                          <a href="{{route('permits.printed')}}" class="nav-link {{ Route::currentRouteNamed( 'permits.printed' ) ?  'active' : '' }}">
                            <i class="fas fa-file nav-icon ml-2"></i>
                            <p> For Pick-up</p>
                          </a>
                        </li>
                        <li class="nav-item ">
                          <a href="{{route('permits.in-transit')}}" class="nav-link {{ Route::currentRouteNamed( 'permits.in-transit' ) ?  'active' : '' }}">
                            <i class="fas fa-file nav-icon ml-2"></i>
                            <p>In-Transit</p>
                          </a>
                        </li>
                        <li class="nav-item ">
                          <a href="{{route('permits.delivered')}}" class="nav-link {{ Route::currentRouteNamed( 'permits.delivered' ) ?  'active' : '' }}">
                            <i class="fas fa-file nav-icon ml-2"></i>
                            <p>Delivered</p>
                          </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item {{ Route::currentRouteNamed( 'permits' ) ?  'menu-open' : '' }}
                                    {{ Route::currentRouteNamed( 'permits.for-printing' ) ?  'menu-open' : '' }}
                                    ">
                    <a href="#" class="nav-link {{ Route::currentRouteNamed( 'permits' ) ?  'active' : '' }}
                                                {{ Route::currentRouteNamed( 'permits.for-printing' ) ?  'active' : '' }}
                                                ">
                    <i class="nav-icon fas fa-qrcode "></i>
                        <p>
                            Label Management
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('permits')}}" class="nav-link {{ Route::currentRouteNamed( 'permits' ) ?  'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Available Permits</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('permits.for-printing')}}" class="nav-link {{ Route::currentRouteNamed( 'permits.for-printing' ) ?  'active' : '' }}">
                                <i class="nav-icon fas fa-print"></i>
                                <p>For Printing</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{route('permits.printed')}}" class="nav-link {{ Route::currentRouteNamed( 'permits.printed' ) ?  'active' : '' }}">
                                <i class="nav-icon fas fa-print"></i>
                                <p>For Printing</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                @can('isAdmin')

                <li class="nav-item {{ Route::currentRouteNamed( 'admin.riders.index' ) ?  'menu-open' : '' }} {{ Route::currentRouteNamed( 'admin.riders.create' ) ?  'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::currentRouteNamed( 'admin.riders.index' ) ?  'active' : '' }} {{ Route::currentRouteNamed( 'admin.riders.create' ) ?  'active' : '' }}">
                    <i class="nav-icon  fas fa-truck"></i>
                        <p>
                            Rider Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item ">
                          <a href="{{route('admin.riders.index')}}" class="nav-link {{ Route::currentRouteNamed( 'admin.riders.index' ) ?  'active' : '' }}">
                            <i class="far fa-user nav-icon ml-2"></i>
                            <p>Registered Rider</p>
                          </a>
                        </li>
                        <li class="nav-item ">
                          <a href="{{route('admin.riders.create')}}" class="nav-link {{ Route::currentRouteNamed( 'admin.riders.create' ) ?  'active' : '' }}">
                            <i class="far fa-user nav-icon ml-2"></i>
                            <p>Add Rider</p>
                          </a>
                        </li>
                        {{-- <li class="nav-item ">
                          <a href="#" class="nav-link ">
                            <i class="far fa-user nav-icon ml-2"></i>
                            <p>Delivered</p>
                          </a>
                        </li> --}}

                    </ul>
                </li>
                @endcan

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper container-login100" style="background-image: url({{asset('images/otd_logo_final.png')}});>
      <section class="content">
        <div class="container-fluid">
                @include('partials.alerts')
            @yield('content')
        </div>
      </section>
      <!-- Content Header (Page header) -->

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2022 On-Time Delivery Admin.</strong>
      All rights reserved.
      {{-- <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
      </div> --}}
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

<!-- ./wrapper -->




<!-- jQuery -->
<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('lte/plugins/toastr.min.js')}}"></script>




<!-- DataTables  & Plugins -->
<script src="{{asset('lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('lte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('lte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('lte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('lte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{asset('lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- dropzonejs -->
<script src="{{asset('lte/plugins/dropzone/min/dropzone.min.js')}}"></script>
{{-- <!-- AdminLTE App --> --}}
<script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('lte/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset('adminlte/dist/js/pages/dashboard.js')}}"></script> --}}


{{-- @yield('scripts') --}}

@stack('scripts')

<script>
/*
  $(function () {
    $("#users").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "excel", "pdf"]
    }).buttons().container().appendTo('#users_wrapper .col-md-6:eq(0)');
  });

*/



</script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('adminlte/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{asset('adminlte/dist/js/pages/dashboard.js')}}"></script> --}}
</body>
</html>
