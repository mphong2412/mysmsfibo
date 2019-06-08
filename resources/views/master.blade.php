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
      <li class="nav-item active ">
        <a class="nav-link" href="index">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Statistics</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading @if (Gate::denies('enable_function', 'compose')) {
           d-none
      } @endif">
        Sms Management
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item @if (Gate::denies('enable_function', 'compose')) {
           d-none
      } @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>SMS</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Compose</h6>
            <a class="collapse-item" href="compose">Compose</a>
            <a class="collapse-item" href="#">Sent</a>
            <a class="collapse-item" href="#">Draft</a>
            <a class="collapse-item" href="#">Outbox</a>
            <a class="collapse-item" href="#">Errors</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- templates -->
      <div class="sidebar-heading @if (Gate::denies('enable_function', 'template')) {
           d-none
      } @endif">
        templates
      </div>
      <li class="nav-item @if (Gate::denies('enable_function', 'template')) {
           d-none
      } @endif">
        <a class="nav-link collapsed" href="templates">
          <i class="fas fa-fw fa-folder"></i>
          <span>Management</span>
        </a>
      </li>

      <!-- Services -->
      <div class="sidebar-heading @if (Gate::denies('enable_function', 'service')) {
           d-none
      } @endif">
        Services
      </div>
      <li class="nav-item @if (Gate::denies('enable_function', 'service')) {
           d-none
      } @endif">
        <a class="nav-link collapsed" href="services">
          <i class="fas fa-fw fa-folder"></i>
          <span>Management</span>
        </a>
      </li>

      <!-- Contacts -->
      <div class="sidebar-heading @if (Gate::denies('enable_function', 'contact')) {
           d-none
      } @endif">
        Contacts
      </div>
      <li class="nav-item @if (Gate::denies('enable_function', 'contact')) {
           d-none
      } @endif">
        <a class="nav-link collapsed" href="group">
          <i class="fas fa-fw fa-folder"></i>
          <span>Groups Management</span>
        </a>
        <a class="nav-link collapsed" href="contacts/list">
          <i class="fas fa-fw fa-folder"></i>
          <span>Contacts Management</span>
        </a>
      </li>

      <!-- Schedulle -->
      <div class="sidebar-heading  @if (Gate::denies('enable_function', 'schedule')) {
           d-none
      } @endif">
        Schedules
      </div>
      <li class="nav-item  @if (Gate::denies('enable_function', 'schedule')) {
           d-none
      } @endif">
        <a class="nav-link collapsed" href="#">
          <i class="fas fa-fw fa-folder"></i>
          <span>Schedules Management</span>
        </a>
      </li>



      <!-- Heading -->
      <div class="sidebar-heading @if (Gate::denies('enable_function', 'userconfig')) {
           d-none
      } @endif">
        Account
      </div>

      <!-- Account -->
      <li class="nav-item @if (Gate::denies('enable_function', 'userconfig')) {
           d-none
      } @endif">
        <a class="nav-link" href="users/list">
          <i class="fas fa-fw fa-user"></i>
          <span>User Config</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item @if (Gate::denies('enable_function', 'noticeconfig')) {
           d-none
      } @endif">
        <a class="nav-link" href="notices">
          <i class="fas fa-fw fa-bell"></i>
          <span>Notice Config</span></a>
      </li>

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
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index" >
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="source/img/logo.png" alt="">
          </a>



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
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Mobile Marketing &copy; Your Website 2019</span>
        </div>
      </div>
    </footer>
    <!-- End of Content Wrapper -->
    <!-- Footer -->
    <!-- End of Footer -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <!-- <script src="source/vendor/jquery/jquery.min.js"></script> -->
  <script src="source/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="source/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="source/js/sb-admin-2.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>

  <script src="source/js/plugins/compose.js" type="text/javascript">

  </script>


  <script src="source/js/demo/chart-pie-demo.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->


</body>

</html>
