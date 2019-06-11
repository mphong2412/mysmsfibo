@extends('master')
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
                                    <label style="margin-top:10%">Quyền: </label><br>
                                    <label style="margin-top:10%; display:none" id="lpass">Mật khẩu: </label>
                                </div>
                                <div class="col-md-10" id="input" style="float:right">

                                    <select name="status" id="status" style="width:200px;margin-top:2%">
                                        @if($account->status == 1)
                                            <option value="1">Kích hoạt</option>
                                            <option value="2">Không kích hoạt</option>
                                            @endif
                                            @if($account->status == 2)
                                                <option value="2">Không kích hoạt</option>
                                                <option value="1">Kích hoạt</option>
                                                @endif
                                    </select><br>

                                    <input type="text" name="txtUname" value="{{$account->username}}" style="margin-top:2%" size="50%" readonly><br>

                                    <input type="text" name="txtFname" value="{{$account->fullname}}" style="margin-top:2%" size="50%"><br>



                                    <input type="text" name="txtApiU" value="{{$account->user_api}}" style="margin-top:2%" size="50%"><br>

                                    <input type="password" name="txtApiP" value="{{$account->user_pass}}" style="margin-top:2%" size="50%"><br>

                                    <input type="email" name="txtEmail" value="{{$account->email}}" style="margin-top:2%" size="50%" readonly><br>

                                    <input type="tel" id="phone" name="txtPhone" value="{{$account->phone}}" size="50px" style="margin-top:2%" pattern="^\+?(?:[0-9]??).{5,14}[0-9]$" title="Please enter phone number." /><br>

                                    <input type="text" name="txtCompa" value="{{$account->company}}" style="margin-top:2%" size="50%"><br>

                                    <input type="text" name="txtAddress" value="{{$account->address}}" style="margin-top:2%" size="50%"><br>

                                    <input type="number" name="txtLimit" value="{{$account->limit_sms}}" min="0" style="margin-top:2%" size="50%"><br>

                                    <select name="role" id="role" style="width:200px;margin-top:2%">
                                        @if($account->role == 1)
                                            <option value="1">Admin</option>
                                            <option></option>
                                            <option value="2">Người dùng</option>
                                            <option value="3">Người dùng phụ</option>
                                            @endif
                                            @if($account->role == 2)
                                                <option value="2">Người dùng</option>
                                                <option></option>
                                                <option value="3">Người dùng phụ</option>
                                                @endif
                                                @if($account->role == 3)
                                                    <option value="3">Người dùng phụ</option>
                                                    <option></option>
                                                    <option value="2">Người dùng</option>
                                                    @endif
                                    </select><br>
                                    <input type="password" name="txtPass" id="txtPass" style="margin-top:2%; display:none" size="50%" />
                                </div>
                            </div>
                        </div>

                        <!-- button cancel -->
                        <button class="btn btn-info" type="reset" style="margin: 10px" onclick="window.location.href='users/list'">
                            <i class="fas fa-times fa-sm"> Hủy</i></button>

                        <!-- button save -->
                        <button type="submit" class="btn btn-success fas fa-save fa-sm" style="margin: 10px"> Lưu</button>

                        <!-- checkbox change password -->
                        <input type="checkbox" name="ip1" id="ip1"> Reset password
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('ip1').onchange = function() {
            if (this.checked) {
                document.getElementById('txtPass').style.display = '';
                document.getElementById('lpass').style.display = '';
            } else {
                document.getElementById('txtPass').style.display = 'none';
                document.getElementById('lpass').style.display = 'none';
            }
        };
    </script>
    @endsection
