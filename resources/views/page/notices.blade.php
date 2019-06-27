@extends('layouts.base')
@section('content')
<div class="container-fluid">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}} <br>
            @endforeach
            <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    @endif
    @if(session('thongbao'))
    <div class="alert alert-success alert-block">
        {{session('thongbao')}}<button type="button" class="close" data-dismiss="alert">&times;</button></div>

    @endif
    <h1>Cấu hình thông báo</h1>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <form action="notice" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="col-sm-12">
                        <label>Thông báo: </label>
                        <input class="form-control" type="textarea" name="txtNotice" id="txtNotice" style="width:40%;height:80px">
                        <input type="text" name="status" value="1" hidden>
                    </div>
                    <button class="btn btn-success" type="button" style="margin: 1%" onclick="window.location.href='notices'">
                        <i class="fas fa-times fa-sm"> Hủy bỏ</i>
                    </button>
                    <button type="submit" class="btn btn-success fas fa-save fa-sm" style="margin: 1%"> Lưu lại</button>
                </form><br>
                <h2>Quản lý thông báo</h2>
                <table class="table table-bordered table-hover " id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th width="70%">Thông báo</th>
                            <th width="10%">Trạng thái</th>
                            <th width="10%">Ngày tạo</th>
                            <th width="10%">Hành động</th>
                        </tr>
                    </thead>
                    @foreach($notices as $t)
                    <tbody>
                        <tr>
                            <td>{{$t->name}}</td>
                            <td>
                                @if($t->status == 1)
                                    Kích hoạt
                                    @endif
                            </td>
                            <td>{{$t->created_at}}</td>
                            <td>
                                <a href="xoa/{{$t->id}}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <p class="pull-left">Hiển thị {{count($notices)}} thông báo.</p>
                {{$notices->links()}}
            </div><!-- /.table-responsive -->
        </div><!-- /.card-body -->
    </div><!-- /.card-shadow -->
</div> <!-- /.container-fluid -->
@endsection
