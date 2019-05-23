@extends('master')
@section('content')
<div class="md-6" style="border:solid">
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
<form action="services/add" method="POST">

  <div class="container">
      <h2>Add New Service</h2>
      <!-- <form action="" method="POST"> -->
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
          <!-- <label for="fname">Service: </label> -->
          <div class="col-sm-12">Name:
          <input type="text" id="Service" name="txtName" size="80px" style="margin-left: 25px" pattern="[A-Z]{1,15}" title="Please enter capital letters."></div><br>

          <label for="lname">Description: </label>
          <input type="textarea" id="Template" name="txtDesc" size="80px"><br>

          <button class="btn btn-success" type="button" style="margin: 5px" >
            <i class="fas fa-plus fa-sm"> Add User</i>
          </button> <br>


  </div>

<table class="table table-bordered" id="dataTable" width="100%" >
  <thead>
    <tr>
      <th>Seq</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Action</th>
    </tr>
  </thead>
</table><br>

<button class="btn btn-success" type="reset" style="margin: 10px" onclick="window.location.href='services'">
  <i class="fas fa-times fa-sm"> Cancel</i>
</button>
  <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Save</button>

</form>
</div>

@endsection
