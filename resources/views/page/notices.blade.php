@extends('master')
@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  @if(count($errors) > 0)
  <div class="elert alert-danger">
    @foreach($errors->all() as $err)
      {{$err}} <br>
    @endforeach
  </div>
  @endif
  @if(session('thongbao'))
  <div class="alert alert-success alert-block">
      
    {{session('thongbao')}}</div>
  @endif
  <h1>Notice Config</h1>
  <form action="notice" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="col-sm-12">
              <label>Notice: </label><br />
              <input type="textarea" name="txtNotice" id="txtNotice"  style="width:40%;height: 80px">
      </div>

      <button class="btn btn-success" type="button" style="margin: 10px" onclick="window.location.href='notices'">
        <i class="fas fa-times fa-sm"> Cancel</i>
      </button>
      <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Save</button>
  </form>
</div>
<!-- /.container-fluid -->
@endsection
