@extends('layouts.base')
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
                    <form action="contacts/edit/{{$contacts->id}}" method="POST">

                        <div id="content" class="container">
                            <center>
                                <h2>Chỉnh sửa danh bạ</h2>
                            </center>
                            <!-- <form action="" method="POST"> -->
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="col-md-12">
                                <div class="col-md-2" id="label" style="float:left">
                                    <label>(*)Nhóm:</label><br>
                                    <label style="margin-top:11%">(*)Số điện thoại:</label><br>
                                    <label style="margin-top:11%">Tên:</label><br>
                                    <label style="margin-top:8%">Giới tính : </label><br>
                                    <label style="margin-top:8%">Email: </label><br>
                                    <label style="margin-top:8%">Ngày sinh: </label><br>
                                    <label style="margin-top:8%">Thành phố : </label><br>
                                    <label style="margin-top:8%">Địa chỉ: </label><br>
                                    <label style="margin-top:8%">Tình trạng: </label>
                                </div>
                                <div class="col-md-10" id="input" style="float:right">
                                    <select class="form-control" name="gname" id="gname" style="width:21.5%">
                                        <option></option>
                                        @foreach($contact_groups as $g)
                                        <option @if($contacts->contact_groups_id == $g->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{$g->id}}">{{$g->name}}</option>
                                        @endforeach
                                    </select>

                                    <input class="form-control" type="text" id="phone" name="txtPhone" value="{{$contacts->phone}}" style="margin-top:1%" pattern="[0-9}" title="Please enter phone number." />

                                    <input class="form-control" type="text" id="name" name="txtName" value="{{$contacts->full_name}}" style="margin-top:1%" />

                                    <input type="radio" name="gender" value="0" style="margin-top:1.5%"> Nam |
                                    <input type="radio" name="gender" value="1" style="margin-top:1.5%"> Nữ<br>

                                    <input class="form-control" type="email" id="email" name="email"style="margin-top:1%" value="{{$contacts->email}}">

                                    <input class="form-control" type="date" id="doB" value="{{$contacts->birthday}}" name="doB" placeholder="Choose" style="margin-top:1%; width:20%">

                                    <select class="form-control" name="city" id="city" style="width:20%;margin-top:1%">
                                        <option></option>
                                        @foreach($city as $t)
                                        <option @if($contacts->city_id == $t->id)
                                            {{"selected"}}
                                            @endif
                                            value="{{$t->id}}">{{$t->name}}</option>
                                        @endforeach
                                    </select>

                                    <input class="form-control" type="text" name="address" value="{{$contacts->address}}" id="address" style="margin-top:1%" />

                                    <select class="form-control" name="status" id="status" style="width:20%;margin-top:1%">
                                        @if($contacts->status == 1)
                                            <option value="1">Đang sử dụng</option>
                                            @endif

                                            @if($contacts->status == 2)
                                                <option value="2">Tạm dừng</option>
                                                @endif

                                                @if($contacts->status == 3)
                                                    <option value="3">Ngưng sử dụng</option>
                                                    @endif
                                    </select>
                                </div>
                            </div>
                        </div><!-- /.content -->

                        <button class="btn btn-info" type="reset" style="margin: 10px" onclick="window.location.href='contacts/list'">
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
