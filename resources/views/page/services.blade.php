@extends('layouts.base')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý dịch vụ</h1>
    @if(count($errors) > 0)
    <div class="elert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}} <br>
            @endforeach
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    @endif
    @if(session('thongbao'))
    <div class="alert alert-success">
        {{session('thongbao')}}
        <button type="button" class="close" data-dismiss="alert">&times;</button></div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="searchs" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="search" name="key" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append" style="margin-bottom: 10px">
                            <button class="btn btn-primary" type="submit" style="margin-left: 10px">
                                <i class="fas fa-search fa-sm"> Tìm kiếm</i>
                            </button>
                            @if (auth::user()->role == 1)
                            <button class="btn btn-success" type="button" style="margin-left: 10px" onclick="window.location.href='services/add'">
                                <i class="fas fa-plus fa-sm"> Thêm mới</i>
                            </button>
                            @endif

                        </div>
                    </div>
                </form>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th width="25%">Dịch vụ</th>
                            <th width="25%">Mô tả</th>
                            @if (auth::user()->role == 1)
                            <th width="25%">Hành động</th>
                            @endif

                        </tr>
                    </thead>
                    @if (auth::user()->role == 1)
                        @foreach($service as $t)
                        <tbody>
                            <tr>
                                <td>{{$t->name}}</td>
                                <td>{{$t->description}}</td>
                                @if (auth::user()->role == 1)
                                <td>
                                    <button class="btn btn-warning btn-warning btn-circle btn-sm" onclick="window.location.href='services/edit/{{$t->id}}'">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="services/xoa/{{$t->id}}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure you want to delete this?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                @endif
                            </tr>
                        </tbody>
                        @endforeach
                    @endif
                    @foreach ($user_has_list_services as $key => $value)
                        @if ($value->user_id == auth::user()->id)
                            @foreach ($service as $key => $t)
                                @if ($t->id == $value->service_id)
                                    <tbody>
                                        <tr>
                                            <td>{{$t->name}}</td>
                                            <td>{{$t->description}}</td>
                                        </tr>
                                    </tbody>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </table>
                @if (auth::user()->role == 1)
                    <p class="pull-left">Hiển thị {{count($service)}} dịch vụ.</p>
                @endif
                {{$service->links()}}
            </div><!-- /.table-responsive -->
        </div><!-- /.card-body-->
    </div><!-- /.card-shadow -->
</div><!-- /.container-fluid -->
@endsection
