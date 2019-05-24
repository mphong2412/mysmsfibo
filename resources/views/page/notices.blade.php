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
  <div class="alert alert-success">
    {{session('thongbao')}}</div>
  @endif
  <h1 class="h3 mb-2 text-gray-800">Notice Config</h1>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
          <form action="{{url(notices)}}" method="post" style="margin:20px">
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              <div class="el-form-item">Notice:<br>
              <textarea rows="3" cols="100" id="note" name="txtNotice"></textarea><br>
                <button class="btn btn-success" type="reset" style="margin: 10px" onclick="window.location.href='notices'">
                    <i class="fas fa-times fa-sm"> Cancel</i>
                </button>
                <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Update</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<script src="source/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="source/js/demo/datatables-demo.js"></script>
@endsection
