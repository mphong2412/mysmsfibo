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
                            <button class="btn btn-primary" type="submit" style="margin-left: 10px">
                                <i class="fas fa-search fa-sm"> Tìm kiếm</i>
                            </button>
                            @if (auth::user()->role == 1)
                            <a href="templates/them"><button class="btn btn-success" type="button" style="margin-left: 10px">
                                    <i class="fas fa-plus fa-sm"> Thêm mới</i>
                                </button></a>
                            @endif
                        </div>
                    </div>
                </form><br><br>

                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th width="25%">Dịch vụ</th>
                            <th width="25%">Mẫu tin</th>
                            @if (auth::user()->role == 1)
                            <th width="25%">Hành động</th>
                            @endif
                        </tr>
                    </thead>
                    @if (auth::user()->role==1)
                        @foreach($templates as $t)
                            <tbody>
                                <tr>
                                    <td>{{$t->service}}</td>
                                    <td>{{$t->template}}</td>
                                    @if (auth::user()->role == 1)
                                        <td>
                                            <button class="btn btn-warning btn-warning btn-circle btn-sm" title="Chỉnh sửa" onclick="window.location.href='templates/sua/{{$t->id}}'">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a href="templates/xoa/{{$t->id}}" class="btn btn-danger btn-circle btn-sm" title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            </tbody>
                        @endforeach
                    @endif
                    @if (auth::user()->role != 1)
                        @foreach ($user_has_templates as $key => $value)
                            @if ($value->user_id == auth::user()->id)
                                @foreach ($templates as $key => $t)
                                    @if ($t->id == $value->template_id)
                                        <tbody>
                                            <tr>
                                                <td>{{$t->service}}</td>
                                                <td>{{$t->template}}</td>
                                            </tr>
                                        </tbody>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </table>
                @if (auth::user()->role == 1)
                    <p class="pull-left">Hiển thị {{count($templates)}} mẫu tin.</p>
                @endif
                {{$templates->links()}}
            </div><!-- /.table-responsive -->
        </div><!-- /.card-body -->
    </div><!-- /.card-shadow -->
</div><!-- /.container-fluid -->
@endsection
