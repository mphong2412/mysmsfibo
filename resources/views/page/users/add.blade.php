@extends('layouts.base')
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
                                </div>
                                <div class="col-md-10" id="input" style="float:right">

                                    <select class="form-control" name="status" id="status" style="width:20%;margin-top:1%">
                                        <option value="1">Kích hoạt</option>
                                        <option value="2">Không kích hoạt</option>
                                    </select>

                                    <input class="form-control" type="text" name="txtUname" title="Nhập tên đăng nhập" style="width:45%;margin-top:1%">

                                    <input class="form-control" type="text" name="txtFname" title="Nhập họ và tên" style="width:45%;margin-top:1%">

                                    <input class="form-control" type="password" name="txtPass" title="Nhập mật khẩu" oninvalid="setCustomValidity('Nhập mật khẩu : {a-Z}{1-9}{!@#$...}. Ví du: aA@123456 ')" pattern="(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}" oninput="setCustomValidity('')"
                                     style="width:45%;margin-top:1%">

                                    <input class="form-control" type="text" name="txtApiU" style="width:45%;margin-top:1%">

                                    <input class="form-control" type="password" name="txtApiP" value="" style="width:45%;margin-top:1%">

                                    <input class="form-control" type="email" name="txtEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="setCustomValidity('Ví dụ : a@fibo.vn')" oninput="setCustomValidity('')" title="Nhập email" style="width:45%;margin-top:1%">

                                    <input class="form-control" type="tel" id="phone" oninvalid="setCustomValidity('Vui lòng nhập số điện thoại. Ex: 0901861912')" oninput="setCustomValidity('')" name="txtPhone" style="width:45%;margin-top:1%" pattern="^\+?(?:[0-9]??).{5,14}[0-9]$" title="Nhập số điện thoại." />

                                    <input class="form-control" type="text" title="Nhập tên công ty" name="txtCompa" style="width:45%;margin-top:1%">

                                    <input class="form-control" type="text" name="txtAddress" title="Nhập địa chỉ" style="width:45%;margin-top:1%">

                                    <input class="form-control" type="number" name="txtLimit" title="Nhập giới hạn sms" min="0" style="width:20%;margin-top:1%">

                                    <select hidden name="role" id="role">
                                        @if (auth::user()->role == 1)
                                        <option value="2">Người dùng</option>
                                        @else
                                        (auth::user()->role == 2)
                                        <option value="3">Người dùng phụ</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- button cancel -->
                        <button class="btn btn-info" type="reset" style="margin: 10px" onclick="window.location.href='{{route('account',[],false)}}'">
                            <i class="fas fa-times fa-sm"> Hủy</i>
                        </button>

                        <!-- button save -->
                        <button type="submit" class="btn btn-success fas fa-save fa-sm" style="margin: 10px"> Lưu</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
