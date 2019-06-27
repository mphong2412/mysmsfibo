@extends('layouts.base')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý mẫu tin</h1>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}} <br>
            @endforeach
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    @endif
    @if(session('thongbao'))
    <div class="alert alert-success">
        {{session('thongbao')}}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="searcht" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="search" class="form-control bg-light border-0 small" name="key" id="key" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="submit" style="margin-left: 10px">
                                <i class="fas fa-search fa-sm"> Tìm kiếm</i>
                            </button>
                            <a href="schedules/add"><button class="btn btn-success" type="button" style="margin-left: 10px">
                                    <i class="fas fa-plus fa-sm"> Thêm mới</i>
                                </button></a>
                        </div>
                    </div>
                </form><br>
                <br>
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th width="11%">STT</th>
                            <th width="11%">Tên chiến dịch</th>
                            <th width="11%">Nội dung</th>
                            <th width="11%">Ngày hẹn</th>
                            <th width="11%">Giờ hẹn</th>
                            <th width="11%">Tình trạng</th>
                            <th width="11%">Trạng thái</th>
                            <th width="11%">Kết quả</th>
                            <th width="11%">Hành động</th>
                        </tr>
                    </thead>
                    @foreach($schedules as $t)
                    <tbody>
                        <tr>
                            <td></td>
                            <td>{{$t->campaign}}</td>
                            <td>{{$t->msg_content}}</td>
                            <td>{{$t->day}}</td>
                            <td>{{$t->time}}</td>
                            <td>{{$t->status}}</td>
                            <td>{{$t->run_status}}</td>
                            <td></td>
                            <td>
                                <button class="btn btn-warning btn-warning btn-circle btn-sm" onclick="window.location.href='templates/sua/{{$t->id}}'">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="templates/xoa/{{$t->id}}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <p class="pull-left">Hiển thị {{count($schedules)}} mẫu tin.</p>
                {{$schedules->links()}}
            </div> <!-- /.table-responsive -->
        </div> <!-- /.card-body -->
    </div> <!-- /.card-shadow -->
</div><!-- /.container-fluid -->
@endsection
