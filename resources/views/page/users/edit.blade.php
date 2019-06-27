@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Cập nhật tài khoản</h1>
    <div class="md-6">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{$err}} <br>
                @endforeach
        </div>
        @endif
        @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}</div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="users/edit/{{$account->id}}" method="POST">

                        <div id="content" class="container">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="col-md-12">
                                <div class="col-md-2" id="label" style="float:left">
                                    <label style="margin-top:10%">Tình trạng:</label><br>
                                    <label style="margin-top:10%">(*)Tên đăng nhập:</label><br>
                                    <label style="margin-top:10%">(*)Họ tên:</label><br>
                                    <label style="margin-top:10%">Api người dùng: </label><br>
                                    <label style="margin-top:10%">Mật khẩu api: </label><br>
                                    <label style="margin-top:10%">(*)Email : </label><br>
                                    <label style="margin-top:10%">(*)Số điện thoại: </label><br>
                                    <label style="margin-top:10%">Công ty: </label><br>
                                    <label style="margin-top:10%">Địa chỉ: </label><br>
                                    <label style="margin-top:10%">Số luọng tin nhắn: </label><br>
                                    {{-- <label style="margin-top:10%">Quyền: </label><br> --}}
                                    <label style="margin-top:10%; display:none" id="lpass">Mật khẩu: </label>
                                </div>
                                <div class="col-md-10" id="input" style="float:right">

                                    <select class="form-control" name="status" id="status" style="width:20%;margin-top:1%">
                                        @if($account->status == 1)
                                            <option value="1">Kích hoạt</option>
                                            <option value="2">Không kích hoạt</option>
                                            @endif
                                            @if($account->status == 2)
                                                <option value="2">Không kích hoạt</option>
                                                <option value="1">Kích hoạt</option>
                                                @endif
                                    </select>

                                    <input class="form-control" type="text" name="txtUname" value="{{$account->username}}" style="width:45%;margin-top:1%" readonly>

                                    <input class="form-control" type="text" name="txtFname" value="{{$account->fullname}}" style="width:45%;margin-top:1%">

                                    <input class="form-control" type="text" name="txtApiU" value="{{$account->user_api}}" style="width:45%;margin-top:1%">

                                    <input class="form-control" type="password" name="txtApiP" value="{{$account->user_pass}}" style="width:45%;margin-top:1%">

                                    <input class="form-control" type="email" name="txtEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="{{$account->email}}" style="width:45%;margin-top:1%"readonly>

                                    <input class="form-control" type="tel" id="phone" name="txtPhone" value="{{$account->phone}}" style="width:45%;margin-top:1%" pattern="^\+?(?:[0-9]??).{5,14}[0-9]$" title="Please enter phone number." />

                                    <input class="form-control" type="text" name="txtCompa" value="{{$account->company}}" style="width:45%;margin-top:1%">

                                    <input class="form-control" type="text" name="txtAddress" value="{{$account->address}}" style="width:45%;margin-top:1%">

                                    <input class="form-control" type="number" name="txtLimit" value="{{$account->limit_sms}}" min="0" style="width:45%;margin-top:1%">

                                    <input class="form-control" type="password" name="txtPass" title="Cấp mật khẩu mới." id="txtPass" style="width:45%;margin-top:1%; display:none" />
                                </div>
                            </div>
                        </div>

                        <!-- button cancel -->
                        <button class="btn btn-info" type="reset" style="margin: 10px" onclick="window.location.href='users/list'">
                            <i class="fas fa-times fa-sm"> Hủy</i></button>

                        <!-- button save -->
                        <button type="submit" class="btn btn-success fas fa-save fa-sm" style="margin: 10px"> Lưu</button>

                        <!-- checkbox change password -->
                        @if (auth::user()->role == 1)
                        <input type="checkbox" name="ip1" id="ip1"> Reset password
                        @endif
                    </form>
                </div><!--/.table-responsive-->
            </div><!--/.card-body-->
        </div><!--/.card-shadow-->
    </div><!--/.md-6-->
</div><!--/.container-fluid-->

<script>
    < blade
    if / > (auth::user() - > role == 1)
    document.getElementById('ip1').onchange = function() {
        if (this.checked) {
            document.getElementById('txtPass').style.display = '';
            document.getElementById('lpass').style.display = '';
        } else {
            document.getElementById('txtPass').style.display = 'none';
            document.getElementById('lpass').style.display = 'none';
        }
    }; <
    blade endif / >
</script>
@endsection
