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
    {{session('thongbao')}}
  @endif
<form action="templates/them" method="POST" ><center>

  <div class="container">
      <h2>Add New Group</h2>
      <!-- <form action="" method="POST"> -->
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
          <label for="fname">Name group: </label>
          <input type="text" id="Service" name="txtGroup" ><br>

          <label for="lname">Description: </label>
          <input type="textarea" id="Template" name="txtDesc" ><br>
  </div>
<button class="btn btn-success" type="button" style="margin: 10px" onclick="history.back();">
  <i class="fas fa-times fa-sm"> Cancel</i>
</button>
  <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Save</button>
</center>
</form>
</div>

@endsection
