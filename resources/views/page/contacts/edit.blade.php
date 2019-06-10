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
<form action="contacts/edit/{{$contacts->id}}" method="POST">

  <div id="content" class="container">
      <center><h2>Chỉnh sửa danh bạ</h2></center>
      <!-- <form action="" method="POST"> -->
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="col-md-12">
        <div class="col-md-2" id="label" style="float:left">
            <label >(*)Nhóm:</label><br>
            <label style="margin-top:3%">(*)Số điện thoại:</label><br>
            <label style="margin-top:3%">Tên:</label><br>
            <label style="margin-top:3%">Giới tính : </label><br>
            <label style="margin-top:3%">Email: </label><br>
            <label style="margin-top:3%">Ngày sinh: </label><br>
            <label style="margin-top:3%">Thành phố : </label><br>
            <label style="margin-top:3%">Địa chỉ: </label><br>
            <label style="margin-top:3%">Tình trạng: </label>
        </div>
        <div class="col-md-10" id="input" style="float:right">
            <select name="gname" id="gname" style="width:200px" >
            <option ></option>
             @foreach($contact_groups as $g)
             <option
             @if($contacts->contact_groups->id == $g->id)
             {{"selected"}}
            @endif
                value="{{$g->id}}">{{$g->name}}</option>
             @endforeach
         </select><br>

            <input type="text" id="phone" name="txtPhone" value="{{$contacts->phone}}" size="50px" style="margin-top:1%" pattern="[0-9}" title="Please enter phone number."/><br>

            <input type="text" id="name" name="txtName" value="{{$contacts->full_name}}" style="margin-top:1%" size="50px"/><br>

            <input type="radio" name="gender" value="0" style="margin-top:1%"> Nam |
            <input type="radio" name="gender" value="1" style="margin-top:1%"> Nữ<br>

            <input type="email" id="email" name="email" size="50px" style="margin-top:1%" value="{{$contacts->email}}"><br>

            <input type="date" id="doB" value="{{$contacts->birthday}}" name="doB" placeholder="Choose" style="margin-top:1%; width:200px"><br>

            <select name="city" id="city" style="width:200px;margin-top:1%">
            <option></option>
             @foreach($city as $t)
             <option
             @if($contacts->city_id == $t->id)
             {{"selected"}}
             @endif
              value="{{$t->id}}">{{$t->name}}</option>
             @endforeach
            </select><br>

            <input type="text" name="address" value="{{$contacts->address}}" id="address" size="50px" style="margin-top:1%"/><br>

            <select name="status" id="status" style="width:200px;margin-top:1%">
            @if($contacts->status == 1)
             <option value="1">Đang sử dụng</option>
            @endif

            @if($contacts->status == 2)
             <option value="2">Tạm dừng</option>
            @endif

            @if($contacts->status == 3)
             <option value="3">Ngưng sử dụng</option>
             @endif
         </select><br>
        </div>
        </div>
  </div>


<button class="btn btn-info" type="reset" style="margin: 10px" onclick="window.location.href='contacts/list'">
  <i class="fas fa-times fa-sm"> Hủy</i>
</button>
  <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Lưu</button>

</form>
</div>
</div>
</div>
</div>
@endsection
