@extends('master')
@section('content')

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Service Managerment</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append" style="margin-bottom: 10px">
              <button class="btn btn-primary" type="button" style="margin-left: 10px">
                <i class="fas fa-search fa-sm"> Search</i>
              </button>
              <button class="btn btn-success" type="button" style="margin-left: 10px" onclick="window.location.href='addtemp'">
                <i class="fas fa-plus fa-sm"> Add New</i>
              </button>
            </div>
          </div>
        </form>
        <div class="md-4">Show
        <label>
        <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
          <option value="5">5/page</option>
          <option value="10">10/page</option>
          <option value="25">25/page</option>
          <option value="50">50/page</option>
          <option value="100">100/page</option>
        </select>
      </label> entries.</div>
      @if(session('thongbao'))
      <div class="alert arlert-success">{{session('thongbao')}}</div>
      @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Seq</th>
              <th>Name</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          @foreach($service as $t)
          <tbody>
            <tr>
              <td>{{$t->id}}</td>
              <td>{{$t->name}}</td>
              <td>{{$t->description}}</td>
              <td>
                <button class="btn  btn-circle btn-sm" onclick="window.location.href='edittemp'">
                  <i class="fas fa-edit"></i>
                </button>
                <a href="services/xoa/{{$t->id}}" class="btn btn-danger btn-circle btn-sm">
                  <i class="fas fa-trash"></i>
                </a>
            </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        <p class="pull-left">Total {{count($service)}} templates.</p>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<script src="source/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="source/js/demo/datatables-demo.js"></script>
@endsection
