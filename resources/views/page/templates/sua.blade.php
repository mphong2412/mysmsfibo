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
<form action="templates/sua/{{$templates->id}}" method="POST" >

  <div class="container">
      <h2>Thông tin mẫu tin</h2>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="col-sm-12">Dịch vụ:
        <input type="text" id="Service" name="txtService" value="{{$templates->service}}" size="80px" pattern="[A-Z]{0,15}" title="Please enter capital letters or enter number."></div><br>

        <div class="col-sm-12">Mẫu tin:
        <input type="textarea" id="Template" name="txtTemplate" value="{{$templates->template}}" size="80px" pattern="[a-Z]{1,15}"></div><br>

        Người dùng được sử dụng mẫu tin  <button class="btn btn-success" type="button" style="margin: 1%">
          <i class="fas fa-plus fa-sm"> Thêm user</i>
        </button> <br>
  </div>

<table class="table table-bordered" id="dataTable" width="100%" >
  <thead>
    <tr>
      <th width="20%">STT</th>
      <th width="20%">Tên</th>
      <th width="20%">Email</th>
      <th width="20%">Số điện thoại</th>
      <th width="20%">Hành động</th>
    </tr>
  </thead>
</table><br>

<button class="btn btn-success" type="button" style="margin: 10px" onclick="window.location.href='templates'">
  <i class="fas fa-times fa-sm"> Hủy</i>
</button>
  <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Lưu</button>

</form>
</div>
</div>
</div>
</div>
@endsection
