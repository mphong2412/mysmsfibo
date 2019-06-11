@extends('master')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý tài khoản</h1>
    @if(count($errors) > 0)
    <div class="elert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}} <br>
            @endforeach
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    @endif
    @if(session('thongbao'))
    <div class="alert alert-success"><strong>{{session('thongbao')}}</strong>
        <button type="button" class="close" data-dismiss="alert">&times;</button></div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="searchu" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="search" name="key" class="form-control bg-light border-0 small" placeholder="Search for..." />
                        <div class="input-group-append" style="margin-bottom: 10px">

                            <button class="btn btn-primary" type="submit" style="margin-left: 10px">
                                <i class="fas fa-search fa-sm"> Tìm kiếm</i>
                            </button>

                            <a href="users/add"><button class="btn btn-success" type="button" style="margin-left: 10px">
                                    <i class="fas fa-plus fa-sm"> Thêm mới</i>
                                </button></a>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr id="test">
                            <th width="15%">Tên đăng nhập</th>
                            <th width="15%">Họ tên</th>
                            <th width="15%">Email</th>
                            <th width="15%">Số điện thoại</th>
                            <th width="15%">Người tạo</th>
                            <th width="15%">Ngày tạo</th>
                            <th width="15%">Hành động</th>
                        </tr>
                    </thead>
                    @foreach($account as $t)
                    <tbody>
                        <tr id="test2">
                            <td>{{$t->username}}</td>
                            <td>{{$t->fullname}}</td>
                            <td>{{$t->email}}</td>
                            <td>{{$t->phone}}</td>
                            <td>{{$t->created_by}}</td>
                            <td>{{$t->created_at}}</td>
                            <td>
                                <button class="btn btn-warning btn-warning btn-circle btn-sm" onclick="window.location.href='users/edit/{{$t->id}}'">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="users/xoa/{{$t->id}}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure you want to delete this?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <p class="pull-left">Hiển thị {{count($account)}} người dùng.</p>
                {{$account->links()}}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    @endsection
