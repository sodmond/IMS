<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }} - {{ config('app.name') }}</title>

    <link href="{{ asset('images/favicon.png') }}" rel="icon" type="image/png">

    <!-- Custom fonts for this template-->
    <link href="{{asset('/backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- Custom styles for this template-->
    <link href="{{asset('/backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/css/custom.css')}}" rel="stylesheet">

</head>

@auth
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('images/logo.png') }}" alt="{{config('app.name')}}" width="60">
                </div>
                <div class="sidebar-brand-text mx-3">
                    Admin
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ ($activePage == 'home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Products -->
            <li class="nav-item {{ ($activePage == 'products') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.products', ['filter' => 'all']) }}">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Products</span></a>
            </li>
            
            <!-- Nav Item - Users -->
            <li class="nav-item {{ ($activePage == 'users') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.users', ['filter' => 'all']) }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Customers</span></a>
            </li>

            <!-- Nav Item - Orders -->
            <li class="nav-item {{ ($activePage == 'orders') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.orders') }}">
                    <i class="fas fa-fw fa-cart-plus"></i>
                    <span>Orders</span></a>
            </li>

            <!-- Nav Item - Invoices -->
            <li class="nav-item {{ ($activePage == 'invoices') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.invoices') }}">
                    <i class="fas fa-fw fa-file-invoice"></i>
                    <span>Invoices</span></a>
            </li>

            <!-- Nav Item - Payments -->
            <li class="nav-item {{ ($activePage == 'payments') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.payments') }}">
                    <i class="fas fa-fw fa-money-bill-wave"></i>
                    <span>Payments</span></a>
            </li>

            <!-- Nav Item - All Settings -->
            <li class="nav-item {{ ($activePage == 'settings') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.settings') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Settings</span></a>
            </li>

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.logout') }}" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            {{--<div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{ asset('img/undraw_rocket.svg') }}" alt="...">
                <h5 class="text-center mb-2"><strong>{{config('app.name')}}</strong></h5>
                <a class="btn btn-info btn-sm" href="https://dealclinchersltd.com/" target="_blank">Visit Website</a>
            </div>

            <li class="nav-item" id="custom-nav" style="background:#ccc; padding:10px; text-align:center;">
                <p class="text-center text-dark mb-2" style="font-size:14px; font-weight:600;">Dealclinchers Realtors Ltd.</p>
                <a class="btn btn-info btn-sm" href="https://dealclinchersltd.com/" target="_blank">Visit Website</a>
            </li>--}}

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form action="{{ url('/search') }}" method="get"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for customer by email, firstname or lastname"
                                name="search" aria-label="Search" aria-describedby="basic-addon2" required>
                            <div class="input-group-append">
                                <button class="btn btn-info" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->firstname }}</span>
                                <i class="fas fa-user-circle fa-lg fa-fw mr-2 text-gray-800"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url('/registered_admin') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ url('/register') }}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{date('Y')}} {{ config('app.name') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('/backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('/backend/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('/backend/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('/backend/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('/backend/js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{asset('/backend/js/custom.js')}}"></script>

</body>
@endauth

@guest
<body class="bg-gradient-light sidebar-toggled">

    @yield('content')
    
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('/js/sb-admin-2.min.js')}}"></script>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
@endguest
</html>