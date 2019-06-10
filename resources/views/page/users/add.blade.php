@extends('master')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tạo tài khoản mới</h1>
    <div class="md-6">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{$err}} <br>
                @endforeach
        </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="users/add" method="POST">

                        <div id="content" class="container">
                            <!-- <form action="" method="POST"> -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="col-md-12">
                                <div class="col-md-2" id="label" style="float:left">
                                    <label style="margin-top:10%">Staus:</label><br>
                                    <label style="margin-top:10%">(*)Tên đăng nhập:</label><br>
                                    <label style="margin-top:10%">(*)Họ tên:</label><br>
                                    <label style="margin-top:10%">(*)Mật khẩu: </label><br>
                                    <label style="margin-top:10%">Api người dùng: </label><br>
                                    <label style="margin-top:10%">Mật khẩu Api: </label><br>
                                    <label style="margin-top:10%">(*)Email : </label><br>
                                    <label style="margin-top:10%">(*)Số điện thoại: </label><br>
                                    <label style="margin-top:10%">Công ty: </label><br>
                                    <label style="margin-top:10%">Địa chỉ: </label><br>
                                    <label style="margin-top:10%">Số lượng tin nhắn: </label><br>
                                    <label style="margin-top:10%">Quyền: </label>
                                </div>
                                <div class="col-md-10" id="input" style="float:right">

                                    <select name="status" id="status" style="width:200px;margin-top:2%">
                                        <option value="1">Kích hoạt</option>
                                        <option value="2">Không kích hoạt</option>
                                    </select><br>

                                    <input type="text" name="txtUname" style="margin-top:2%" size="50px"><br>

                                    <input type="text" name="txtFname" style="margin-top:2%" size="50px"><br>

                                    <input type="password" name="txtPass" style="margin-top:2%" size="50px"><br>

                                    <input type="text" name="txtApiU" style="margin-top:2%" size="50px"><br>

                                    <input type="password" name="txtApiP" value="" style="margin-top:2%" size="50px"><br>

                                    <input type="email" name="txtEmail" value="" style="margin-top:2%" size="50px"><br>

                                    <input type="tel" id="phone" name="txtPhone" size="50px" style="margin-top:2%" pattern="^\+?(?:[0-9]??).{5,14}[0-9]$" title="Nhập số điện thoại." /><br>

                                    <input type="text" name="txtCompa" style="margin-top:2%" size="50px"><br>

                                    <input type="text" name="txtAddress" style="margin-top:2%" size="50px"><br>

                                    <input type="number" name="txtLimit" min="0" style="margin-top:2%" size="50px"><br>

                                    <select name="role" id="role" style="width:200px;margin-top:2%">
                                        <option></option>
                                        <option value="1">Admin</option>
                                        <option value="2">Người dùng</option>
                                        <option value="3">Người dùng phụ</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <button class="btn btn-info" type="reset" style="margin: 10px" onclick="window.location.href='users/list'">
                            <i class="fas fa-times fa-sm"> Hủy</i>
                        </button>
                        <button type="submit" class="btn btn-success fas fa-save fa-sm" style="margin: 10px"> Lưu</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
