<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="LPRM SULTENG">
    <meta name="description" content="LPRM SULTENG">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title') | LPRM SULTENG</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=url('/')?>/public/images/logo/logo.svg">
    <!-- Custom CSS -->
    <link href="<?=url('/')?>/public/template/admin/dist/css/style.min.css" rel="stylesheet">

    @yield('header-scripts')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header border-right">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <img src="<?=url('/')?>/public/images/logo/logo.svg" alt="homepage" class="dark-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <div class="ml-2 font-weight-bold">LPRM SULTENG</div>
                        </span>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item d-none d-md-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-18"></i></a></li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="<?=url('/')?>/public/images/user/default.png" alt="user"
                                    class="rounded-circle" width="36">
                                @if(Session::get('level_akses') == 'Superadmin')
                                <span class="ml-2 font-medium">{{Session::get('username')}}</span><span
                                    class="fas fa-angle-down ml-2"></span>
                                @else
                                <span class="ml-2 font-medium">{{Session::get('nama_rental')}}</span><span
                                    class="fas fa-angle-down ml-2"></span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                                    <div class=""><img src="<?=url('/')?>/public/images/user/default.png" alt="user"
                                            class="rounded" width="80"></div>
                                    <div class="ml-2">
                                        <h4 class="mb-0">{{Session::get('username')}}</h4>
                                        <button data-toggle="modal" data-target="#modal-ganti-pass"
                                            class="btn btn-sm btn-warning text-white mt-2 btn-rounded">Ganti
                                            Password</button>
                                    </div>
                                </div>
                                <a class="dropdown-item"
                                    href="{{url('/')}}/{{strtolower(Session::get('level_akses'))}}/pengaturan-akun"><i
                                        class="ti-settings mr-1 ml-1"></i>
                                    Pengaturan Akun</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('/logout')}}"><i
                                        class="fa fa-power-off mr-1 ml-1"></i> Keluar</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{url('/')}}/{{strtolower(Session::get('level_akses'))}}" aria-expanded="false"><i
                                    class="fas fa-home"></i><span class="hide-menu">Dashboard</span></a></li>
                        <div class="devider"></div>
                        @if(Session::get('level_akses') == 'Superadmin')
                        <li class="sidebar-item @if(Request::segment(2) == 'rental') selected @endif"> <a
                                class="sidebar-link waves-effect waves-dark sidebar-link "
                                href="{{url('/superadmin/rental')}}" aria-expanded="false"><i
                                    class="fas fa-columns"></i><span class="hide-menu">Rental</span></a></li>
                        <li class="sidebar-item @if(Request::segment(2) == 'mobil') selected @endif"> <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{url('/superadmin/mobil')}}" aria-expanded="false"><i
                                    class="fas fa-car"></i><span class="hide-menu">Daftar Mobil</span></a></li>
                        <div class="devider"></div>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fas fa-caret-right"></i><span
                                    class="hide-menu">Spesifikasi Mobil</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="{{url('/superadmin/spesifikasi-mobil/jenis')}}"
                                        class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">
                                            Jenis</span></a></li>
                                <li class="sidebar-item"><a href="{{url('/superadmin/spesifikasi-mobil/merk')}}"
                                        class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">
                                            Merek</span></a></li>
                                <li class="sidebar-item"><a href="{{url('/superadmin/spesifikasi-mobil/tipe')}}"
                                        class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu">
                                            Tipe</span></a></li>
                         
                            </ul>
                        </li>
                        <div class="devider"></div>
                        <li class="sidebar-item @if(Request::segment(2) == 'berita') selected @endif"> <a
                                class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{url('/superadmin/berita')}}" aria-expanded="false"><i
                                    class="fas fa-newspaper"></i><span class="hide-menu">Berita</span></a></li>

                        @elseif(Session::get('level_akses') == 'Rental')
                        <li class="sidebar-item @if(Request::segment(2) == 'atur-rental') selected @endif"> <a
                                class="sidebar-link waves-effect waves-dark sidebar-link "
                                href="{{url('/rental/atur-rental')}}" aria-expanded="false"><i
                                    class="fas fa-columns"></i><span class="hide-menu">Atur Rental</span></a></li>
                        <li class="sidebar-item @if(Request::segment(2) == 'mobil') selected @endif"> <a
                                class="sidebar-link waves-effect waves-dark sidebar-link "
                                href="{{url('/rental/mobil')}}" aria-expanded="false"><i class="fas fa-car"></i><span
                                    class="hide-menu">Daftar Mobil</span></a></li>

                        @endif
                        <div class="devider"></div>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{url('/logout')}}" aria-expanded="false"><i
                                    class="fa fa-power-off"></i><span class="hide-menu">Keluar</span></a></li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb border-bottom">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 justify-content-start d-flex align-items-center">
                        <h5 class="font-medium text-uppercase mb-0">@yield('title-page')</h5>
                    </div>
                    <div
                        class="col-lg-9 col-md-8 col-xs-12 d-flex justify-content-start justify-content-md-end align-self-center">
                        <nav aria-label="breadcrumb" class="mt-2">

                            <ol class="breadcrumb mb-0 p-0">
                                @yield('breadcrumb-page')

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->



            @yield('content')


            @yield('modal')

            <div class="modal fade" id="modal-ganti-pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header bg-warning">
                            <h3 class="modal-title">Ganti Password / Kata Sandi</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="color:white;">×</span>
                            </button>
                        </div>
                        <!--Body-->
                        <form action="{{url('/ganti-password')}}" method="POST">
                            @csrf
                            <input type="hidden" value="PUT" name="_method">
                            <div class="modal-body">
                                <div class="text-center mb-2 text-uppercase modal-title">
                                    <i class="fas fa-user-lock fa-4x mb-3"></i>
                                    <h5><b> Silahkan Isi Password / Kata Sandi Baru Anda
                                        </b></h5>
                                    <hr>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="ganti_pass">Password / Kata Sandi Baru</label>
                                    <input class="form-control @if($errors->first('ganti_pass')) is-invalid @endif"
                                        type="password" placeholder="************" name="ganti_pass" id="ganti_pass"
                                        value="{{old('ganti_pass')}}" required>
                                    @if($errors->first('ganti_pass'))
                                    <small style="color: red">{{ $errors->first('ganti_pass')}}</small>
                                    @endif
                                </div>

                                <div class="form-group mb-2">
                                    <label for="ganti_pass_confirm">Konfirmasi Password / Kata Sandi Baru</label>
                                    <input
                                        class="form-control @if($errors->first('ganti_pass_confirm')) is-invalid @endif"
                                        type="password" placeholder="************" name="ganti_pass_confirm"
                                        id="ganti_pass_confirm" value="{{old('ganti_pass_confirm')}}" required>
                                    @if($errors->first('ganti_pass_confirm'))
                                    <small style="color: red">{{ $errors->first('ganti_pass_confirm')}}</small>
                                    @endif
                                </div>




                            </div>

                            <div class="modal-footer justify-content-between ">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-warning">Simpan</button>

                            </div>
                        </form>
                    </div>
                    <!--/.Content-->
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Ample admin. Designed and Developed by <a
                    href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <script src="<?=url('/')?>/public/template/admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=url('/')?>/public/template/admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=url('/')?>/public/template/admin/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?=url('/')?>/public/template/admin/dist/js/app.min.js"></script>
    <script src="<?=url('/')?>/public/template/admin/dist/js/app.init.js"></script>
    <script src="<?=url('/')?>/public/template/admin/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script
        src="<?=url('/')?>/public/template/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js">
    </script>
    <script src="<?=url('/')?>/public/template/admin/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?=url('/')?>/public/template/admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?=url('/')?>/public/template/admin/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?=url('/')?>/public/template/admin/dist/js/custom.min.js"></script>

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    @yield('footer-scripts')

</body>

</html>
