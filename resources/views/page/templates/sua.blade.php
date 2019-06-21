@extends('master')
@section('content')
<div class="container-fluid">
    <div class="md-6">
        @if(count($errors) > 0)
        <div class="elert alert-danger">
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
                    <form action="templates/sua/{{$templates->id}}" method="POST">

                        <div class="container">
                            <h2>Thông tin mẫu tin</h2>
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="col-sm-12">
                                <label>Dịch vụ:</label>
                                <input class="form-control" type="text" id="Service" name="txtService" style="width:80%" value="{{$templates->service}}" pattern="[A-Z]{0,15}" title="Please enter capital letters or enter number."></div>

                            <div class="col-sm-12">
                                <label>Mẫu tin:</label>
                                <input class="form-control" type="textarea" id="Template" name="txtTemplate" style="width:80%" value="{{$templates->template}}"></div>

                            Người dùng được sử dụng mẫu tin <button class="btn btn-success" type="button" style="margin: 1%">
                                <i class="fas fa-plus fa-sm"> Thêm user</i>
                            </button> <br>
                        </div>

                        <table class="table table-bordered" id="dataTable" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="20%">STT</th>
                                    <th width="20%">Tên</th>
                                    <th width="20%">Email</th>
                                    <th width="20%">Số điện thoại</th>
                                    <th width="20%">Hành động</th>
                                </tr>
                            </thead>
                        </table><br>

                        <button class="btn btn-success" type="button" style="margin: 1%" onclick="window.location.href='templates'">
                            <i class="fas fa-times fa-sm"> Hủy</i>
                        </button>
                        <button type="submit" class="btn btn-success fas fa-save fa-sm" style="margin: 1%"> Lưu</button>

                    </form>
                </div><!-- /.table-responsive -->
            </div><!-- /.card-body -->
        </div><!-- /.card-shadow -->
    </div><!-- /.md-6 -->
</div><!-- /.container -->
@endsection
