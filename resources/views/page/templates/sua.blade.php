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
<form action="templates/sua/{{$templates->id}}" method="POST" >

  <div class="container">
      <h2>Edit Template</h2>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="col-sm-12">Service:
        <input type="text" id="Service" name="txtService" value="{{$templates->service}}"></div><br>

        <label for="lname">Template: </label>
        <input type="textarea" id="Template" name="txtTemplate" value="{{$templates->template}}"><br>

        <button class="btn btn-success" type="button" style="margin: 5px">
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

<button class="btn btn-success" type="button" style="margin: 10px" onclick="window.location.href='templates'">
  <i class="fas fa-times fa-sm"> Cancel</i>
</button>
  <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Save</button>

</form>
</div>

@endsection
