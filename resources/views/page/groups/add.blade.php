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
<form action="groups/add" method="POST">

  <div class="container">
      <h2>Add New Group</h2>
      <!-- <form action="" method="POST"> -->
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
          <!-- <label for="fname">Service: </label> -->
          <div class="col-sm-12">Group Name:
          <input type="text"  name="txtGroup" size="80px"  pattern="[a-Z]{0,15}"></div><br>

          <label for="lname" style="margin-left: 10px">Description: </label>
          <input type="textarea" name="txtDesc" style="margin-left: 10px" size="80px"><br>
  </div>
<button class="btn btn-success" type="reset" style="margin: 10px" onclick="window.location.href='group'">
  <i class="fas fa-times fa-sm"> Cancel</i>
</button>
  <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Save</button>
</form>
</div>
</div>
</div>
</div>
@endsection
