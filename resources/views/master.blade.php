<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('source/..')}}">

    <title>Fibo - Mobile Marketing</title>

  <!-- Custom fonts for this template-->
  <link href="source/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Custom styles for this template-->
  <link href="source/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <!-- Custom styles for this page -->
  <link href="source/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Statistics</span></a>
      </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <div class="sidebar-heading">
                Quản lý SMS
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            @if (Gate::denies('enable_function', 'sms'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>SMS</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                      @if (Gate::denies('enable_function', 'compose'))
                        <a class="collapse-item " href="compose">Soạn tin</a>
                      @endif
                      @if (Gate::denies('enable_function', 'draft'))
                        <a class="collapse-item " href="compose">Tin nháp</a>
                      @endif
                      @if (Gate::denies('enable_function', 'outbox'))
                        <a class="collapse-item " href="compose">Tin chờ</a>
                      @endif
                      @if (Gate::denies('enable_function', 'sent'))
                        <a class="collapse-item " href="compose">Đã gửi</a>
                      @endif
                      @if (Gate::denies('enable_function', 'error'))
                        <a class="collapse-item " href="compose">Tin lỗi</a>
                      @endif

                    </div>
                </div>
            </li>
            @endif
            <!-- Nav Item - Utilities Collapse Menu -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- templates -->
            @if (Gate::denies('enable_function', 'template'))
            <div class="sidebar-heading ">
                Mẫu tin
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="templates">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Quản lý mẫu tin</span>
                </a>
            </li>
            @endif

            <!-- Services -->
            @if (Gate::denies('enable_function', 'service'))
            <div class="sidebar-heading">
                Dịch vụ
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="services">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Quản lý dịch vụ</span>
                </a>
            </li>
            @endif

            <!-- Contacts -->
            @if (Gate::denies('enable_function', 'contact'))
            <div class="sidebar-heading">
                Contacts
            </div>
            <li class="nav-item ">
                <a class="nav-link collapsed" href="group">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Quản lý nhóm</span>
                </a>
                <a class="nav-link collapsed" href="contacts/list">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Quản lý danh bạ</span>
                </a>
            </li>
            @endif

            <!-- Schedulle -->
            @if (Gate::denies('enable_function', 'schedule'))
            <div class="sidebar-heading">
                Lịch hẹn
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="schedules/list">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Quản lý lịch hẹn</span>
                </a>
            </li>
            @endif



            <!-- Heading -->
            @if (Gate::denies('enable_function', 'userconfig'))
            <div class="sidebar-heading ">
                Tài khoản
            </div>

            <!-- Account -->
            <li class="nav-item">
                <a class="nav-link" href="users/list">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Cấu hình người dùng</span></a>
            </li>
            @endif

            <!-- Nav Item - Tables -->
            @if (Gate::denies('enable_function', 'noticeconfig'))
            <li class="nav-item ">
                <a class="nav-link" href="notices">
                    <i class="fas fa-fw fa-bell"></i>
                    <span>Thông báo</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

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
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="source/img/logo.png" alt="">
                    </a>

                    <marquee behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                        @foreach ($notices as $n)
                        @if ($n->status == 1)
                        ● {{$n->name}}<span style="margin-left:20%"></span>
                        @endif
                        @endforeach
                    </marquee>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(Auth::check())
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hello, {{Auth::user()->fullname}}
                                </span>
                                @endif
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="users/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout')}}">
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <div class="rev-slider">
                    @yield('content')
                </div>
            </div>
            <!-- End of Content Wrapper -->
            <!-- Footer -->
        </div>

        <!-- End of Footer -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Mobile Marketing &copy; Your Website 2019</span>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript-->
    <script src="source/vendor/jquery/jquery.min.js"></script>
    <script src="source/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="source/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="source/js/sb-admin-2.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>

  <script src="source/js/plugins/compose.js" type="text/javascript">

  </script>


    <!-- Page level custom scripts -->
    <script src="source/js/demo/chart-pie-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


</body>

</html>
