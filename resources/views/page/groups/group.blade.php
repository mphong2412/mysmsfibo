@extends('layouts.base')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý nhóm</h1>
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
        <button type="button" class="close" data-dismiss="alert">&times;</button></div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="searchg" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="search" name="key" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append" style="margin-bottom: 10px">
                            <button class="btn btn-primary" type="submit" style="margin-left: 10px">
                                <i class="fas fa-search fa-sm"> Tìm kiếm</i>
                            </button>
                            <a href="{{route('group-add',[],false)}}" class="btn btn-secondary" role="button"><i class="fas fa-plus fa-sm"> Thêm mới</i></a>
                        </div>
                    </div>
                </form>

                <div class="w3-container w3-center w3-animate-zoom">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th width="25%">STT</th>
                                <th width="25%">Tên</th>
                                <th width="25%">Mô tả</th>
                                <th width="25%">Hành động</th>
                            </tr>
                        </thead>
                        @foreach($groups as $t)
                        <tbody>
                            <tr>
                                <td>{{$t->id}}</td>
                                <td>{{$t->name}}</td>
                                <td>{{$t->description}}</td>
                                <td>
                                    <button class="btn btn-warning btn-warning btn-circle btn-sm" onclick="window.location.href='{{route('group-edit',[$t->id],false)}}'">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="{{route('group-del',[$t->id],false)}}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure you want to delete this?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div> <!-- /.w3-container -->

                <p class="pull-left">Hiển thị {{count($groups)}} nhóm.</p>
                {{$groups->links()}}

            </div><!-- /.table-responsive -->
        </div><!-- /.card-body -->
    </div><!-- /.card-shadow -->
</div><!-- /.container-fluid -->


<div id="ModalAddUser" class="modal fade">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Thông tin nhóm</h1>
            </div>
            <div class="modal-body">
                <form method="post" action="modaltu">
                    @csrf
                    <div class="col-sm-12">Tên nhóm:
                        <input class="form-control" type="text" name="txtGroup"></div><br>

                    <div class="col-sm-12">Mô tả:
                        <input class="form-control" type="textarea" name="txtDesc"></div><br>
                </form>
            </div>
            <div class="modal-footer">
                </button>
                <button type="submit" class="btn btn-success fas fa-save fa-sm"> Lưu</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@endsection
