@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="md-6">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}} <br>
                @endforeach
        </div>
        @endif
        @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}</div>
        @endif
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="groups/add" method="POST">
                        <div class="container">
                            <h2>Thông tin nhóm</h2>
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="col-sm-12">Tên nhóm:
                                <input class="form-control" type="text" name="txtGroup" pattern="[a-Z]{0,15}"></div><br>

                            <div class="col-sm-12">Mô tả:
                                <input class="form-control" type="textarea" name="txtDesc"></div><br>
                        </div>
                        <button class="btn btn-success" type="reset" style="margin: 10px" onclick="window.location.href='group'">
                            <i class="fas fa-times fa-sm"> Hủy</i>
                        </button>
                        <button type="submit" class="btn btn-success fas fa-save fa-sm" style="margin: 10px"> Lưu</button>
                    </form>
                </div><!-- /.table-responsive -->
            </div><!-- /.card-body -->
        </div><!-- /.card-shadow -->
    </div><!-- /.md-6 -->
</div><!-- /.container-fluid -->
@endsection
