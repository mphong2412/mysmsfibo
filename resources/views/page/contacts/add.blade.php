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
                    <form action="contacts/add" method="POST">

                        <div id="content" class="container">
                            <center>
                                <h2>Thêm mới danh bạ</h2>
                            </center>
                            <!-- <form action="" method="POST"> -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="col-md-12">
                                <div class="col-md-2" id="label" style="float:left">
                                    <label>(*)Nhóm:</label><br>
                                    <label style="margin-top:10%">(*)Số điện thoại:</label><br>
                                    <label style="margin-top:11%">Tên:</label><br>
                                    <label style="margin-top:8%">Giới tính : </label><br>
                                    <label style="margin-top:8%">Email: </label><br>
                                    <label style="margin-top:8%">Ngày sinh: </label><br>
                                    <label style="margin-top:8%">Thành phố : </label><br>
                                    <label style="margin-top:8%">Địa chỉ: </label><br>
                                    <label style="margin-top:8%">Tình trạng: </label>
                                </div>
                                <div class="col-md-10" id="input" style="float:right">
                                    <select class="form-control " name="gname" id="gname" style="width:21.5%">
                                        <option value="" disabled selected>Choose your option</option>
                                        @foreach($contact_groups as $g)
                                        <option value="{{$g->id}}">{{$g->name}}</option>
                                        @endforeach
                                    </select>

                                    <input class="form-control" type="tel" id="phone" name="txtPhone" size="50px" style="margin-top:1%" pattern="^\+?(?:[0-9]??).{5,14}[0-9]$" title="Please enter phone number." />

                                    <input class="form-control" type="text" id="name" name="txtName" style="margin-top:1%" size="50px" />

                                    <input type="radio" name="gender" value="0" style="margin-top:1.5%"> Nam |
                                    <input type="radio" name="gender" value="1" style="margin-top:1.5%"> Nữ

                                    <input type="email" id="email" class="form-control" name="email" size="50px" style="margin-top:1%">

                                    <input type="date" class="form-control" id="doB" name="doB" placeholder="Choose" style="margin-top:1%; width:20%">

                                    <select class="form-control" name="city" id="city" style="margin-top:1%;width:20%;">
                                        @foreach($city as $t)
                                        <option value="{{$t->id}}">{{$t->name}}</option>
                                        @endforeach
                                    </select>

                                    <input class="form-control" type="text" name="address" id="address" size="50px" style="margin-top:1%" />

                                    <select class="form-control" name="status" id="status" style="width:20%;margin-top:1%">
                                        <option value="1">Đang sử dụng</option>
                                        <option value="2">Tạm dừng</option>
                                        <option value="3">Ngưng sử dụng</option>
                                    </select><br>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-info" type="reset" style="margin: 10px" onclick="window.location.href='contacts/list'">
                            <i class="fas fa-times fa-sm"> Hủy</i>
                        </button>
                        <button type="submit" class="btn btn-success fas fa-save fa-sm" style="margin: 10px"> Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
