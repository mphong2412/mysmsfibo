<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Fibo - MySMS</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- Custom styles for this page -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body id="page-top">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow">
                <!-- Topbar -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="/source/img/logo.png" alt="">
                </a>
                <marquee behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                    @foreach ($notices as $item)
                        @if ($item->status == 1)
                            <i class="fa fa-bell" aria-hidden="true"></i> 
                                {{$item->name}}
                            <span style="margin-left:20%"></span>
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
                            <span class="mr-2 d-none d-lg-inline text-dark"> Hello, {{Auth::user()->fullname}} !
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
        </div>
    </div>
    <div class="row" id="body-row">
        <!-- Sidebar -->
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
                <!-- Bootstrap List Group -->
                <ul class="list-group">
                    <!-- /END Separator -->
                    <!-- Menu with submenu -->
                    <a href="{{route('dashboard', [], false)}}" class="@if(Route::current()->uri === "/") sidebar_active @else bg-dark @endif list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-area-chart fa-fw mr-3"></span>
                            <span class="menu-collapsed">Dashboard</span>
                        </div>
                    </a>
                    @if (Gate::allows('enable_function', 'sms'))
                        <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fa fa-commenting fa-fw mr-3"></span> 
                                <span class="menu-collapsed">Quản lý tin nhắn</span>
                                <span class="submenu-icon ml-auto"></span>
                            </div>
                        </a>
                        <!-- Tin nhắn -->
                        <div id='submenu1' class="collapse sidebar-submenu @if(Route::current()->uri === "manage-sms/compose") show @endif">
                            @if (Gate::allows('enable_function', 'compose'))
                                <a href="{{route('compose', [], false)}}" class="@if(Route::current()->uri === "manage-sms/compose") sidebar_active @else bg-dark @endif list-group-item list-group-item-action text-white">
                                    <span class="menu-collapsed"><i class="fa fa-commenting mr-2"></i>Soạn tin</span>
                                </a>
                            @endif
                            @if (Gate::allows('enable_function', 'draft'))
                                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                                    <span class="menu-collapsed"><i class="fa fa-hourglass-2 mr-2"></i>Bản nháp</span>
                                </a>
                            @endif
                            @if (Gate::allows('enable_function', 'sent'))
                                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                                    <span class="menu-collapsed"><i class="fa fa-send mr-2"></i>Tin đã gửi</span>
                                </a>
                            @endif
                            @if (Gate::allows('enable_function', 'outbox'))
                            
                                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                                    <span class="menu-collapsed"><i class="fa fa-outdent mr-2"></i>Tin chờ gửi</span>
                                </a>
                            @endif
                            @if (Gate::allows('enable_function', 'error'))
                                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                                    <span class="menu-collapsed"><i class="fa fa-warning mr-2"></i>Tin gửi lỗi</span>
                                </a>
                            @endif
                        </div>
                    @endif

                    {{-- Mẫu tin --}}
                    @if (Gate::allows('enable_function', 'template'))
                        <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fa fa-files-o fa-fw mr-3"></span>
                                <span class="menu-collapsed"></i>Danh sách mẫu tin</span>
                                <span class="submenu-icon ml-auto"></span>
                            </div>
                        </a>
                        <div id='submenu2' class="collapse sidebar-submenu @if(Route::current()->uri === "templates") show @endif">
                            <a href="{{route('template', [], false)}}" class="@if(Route::current()->uri === "templates") sidebar_active @else bg-dark @endif list-group-item list-group-item-action text-white">
                                <span class="menu-collapsed"><i class="fa fa-files-o mr-2"></i>Quản lý mẫu tin</span>
                            </a>
                        </div>
                    @endif
                    {{-- Dịch vụ --}}
                    @if (Gate::allows('enable_function', 'service'))
                        <a href="#submenu3" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fa fa-sitemap fa-fw mr-3"></span>
                                <span class="menu-collapsed">Danh sách dịch vụ</span>
                                <span class="submenu-icon ml-auto"></span>
                            </div>
                        </a>
                        <div id='submenu3' class="collapse sidebar-submenu @if(Route::current()->uri === "manage-service") show @endif">
                            <a href="{{route('services', [], false)}}" class="@if(Route::current()->uri === "manage-service") sidebar_active @else bg-dark @endif list-group-item list-group-item-action text-white">
                                <span class="menu-collapsed"><i class="fa fa-sitemap mr-2"></i>Quản lý danh sách dịch vụ</span>
                            </a>
                        </div>
                    @endif
                    {{-- Danh bạ --}}
                    @if (Gate::allows('enable_function', 'contact'))
                        <a href="#submenu4" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fa fa-address-book fa-fw mr-3"></span>
                                <span class="menu-collapsed">Danh bạ</span>
                                <span class="submenu-icon ml-auto"></span>
                            </div>
                        </a>
                        <div id='submenu4' class="collapse sidebar-submenu  @if(Route::current()->uri === "manage-contact/group" || Route::current()->uri === "manage-contact/address-book") show @endif">
                            <a href="{{route('contact-group', [], false)}}" class="@if(Route::current()->uri === "manage-contact/group") sidebar_active @else bg-dark @endif list-group-item list-group-item-action text-white">
                                <span class="menu-collapsed"><i class="fa fa-users mr-2"></i>Quản lý nhóm</span>
                            </a>
                            <a href="{{route('contact-address-book', [], false)}}" class="@if(Route::current()->uri === "manage-contact/address-book") sidebar_active @else bg-dark @endif list-group-item list-group-item-action text-white">
                                <span class="menu-collapsed"><i class="fa fa-address-book mr-2"></i>Quản lý danh bạ</span>
                            </a>
                        </div>
                    @endif

                    {{-- Lịch hẹn --}}
                    @if (Gate::allows('enable_function', 'schedule'))

                        <a href="#submenu5" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fa fa-calendar fa-fw mr-3"></span>
                                <span class="menu-collapsed">Lịch hẹn</span>
                                <span class="submenu-icon ml-auto"></span>
                            </div>
                        </a>
                        <div id='submenu5' class="collapse sidebar-submenu @if(Route::current()->uri === "manage-schedule") show @endif">
                            <a href="{{route('schedule', [], false)}}" class="@if(Route::current()->uri === "manage-schedule") sidebar_active @else bg-dark @endif list-group-item list-group-item-action text-white">
                                <span class="menu-collapsed"><i class="fa fa-calendar mr-2"></i>Quản lý lịch hẹn</span>
                            </a>
                        </div>
                    @endif

                    {{-- Tài khoản --}}
                    @if (Gate::allows('enable_function', 'userconfig'))

                        <a href="#submenu6" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fa fa-users fa-fw mr-3"></span>
                                <span class="menu-collapsed">Tài khoản</span>
                                <span class="submenu-icon ml-auto"></span>
                            </div>
                        </a>

                        <!-- Submenu content -->
                        <div id='submenu6' class="collapse sidebar-submenu @if(Route::current()->uri === "manage-account") show @endif">
                            <a href="{{route('account', [], false)}}" class="@if(Route::current()->uri === "manage-account") sidebar_active @else bg-dark @endif list-group-item list-group-item-action text-white">
                                <span class="menu-collapsed"><i class="fa fa-user-circle mr-2"></i> Cấu hình người dùng </span>
                            </a>
                        </div>

                        <a href="{{route('notification', [], false)}}" class="@if(Route::current()->uri === "config-notification") sidebar_active @else bg-dark @endif list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-start align-items-center">
                                <span class="fa fa-area-chart fa-fw mr-3"></span>
                                <span class="menu-collapsed">Cấu hình thông báo</span>
                            </div>
                        </a>
                    @endif 
                    
                    <a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                            <span id="collapse-text" class="menu-collapsed">Đóng Sidebar</span>
                        </div>
                    </a>  
                </ul>
            </div><!-- sidebar-container END -->
            <!-- MAIN -->
            <div class="col">
                {{-- <h2>
                    MENU
                </h2>
                <div class="card">
                    <h4 class="card-header">Requirements</h4>
                    <div class="card-body">
                        <ul>
                            <li>JQuery</li>
                            <li>Bootstrap 4 beta-3</li>
                        </ul>
                    </div>
                </div> --}}
                @yield('content')
            </div><!-- Main Col END -->
        </div><!-- body-row END -->
    <footer class="app-footer"><a href="http://fibo.vn">MY SMS</a> © 2017 Fibo.
        <span class="float-right">Powered by <a href="http://fibo.vn">Fibo</a></span>
    </footer>
    <script src="{{ asset('js/base.js') }}"> </script>
    @section('scripts')
    @show
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
