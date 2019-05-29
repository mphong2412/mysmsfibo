@extends('master')
@section('content')

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Contact Managerment</h1>
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
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <form action="searchu" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
         <div class="input-group">
            <input type="search" name="key" class="form-control bg-light border-0 small" placeholder="Search for..."/>
            <div class="input-group-append" style="margin-bottom: 10px">

              <button class="btn btn-primary" type="submit" style="margin-left: 10px">
                <i class="fas fa-search fa-sm"> Search</i>
              </button>

              <a href="contacts/add"><button class="btn btn-success" type="button" style="margin-left: 10px" >
                <i class="fas fa-plus fa-sm"> Add New</i>
              </button></a>
            </div>
        </div>
        </form>
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0" >
          <thead>
            <tr id="test">
              <th>Username</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone number</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          @foreach($account as $t)
          <tbody>
            <tr id="test2">
              <td>{{$t->username}}</td>
              <td>{{$t->fullname}}</td>
              <td>{{$t->email}}</td>
              <td>{{$t->phone}}</td>
              <td>{{$t->created_at}}</td>
              <td>
                <button class="btn btn-warning btn-warning btn-circle btn-sm" onclick="window.location.href='users/edit/{{$t->id}}'" >
                  <i class="fas fa-edit"></i>
                </button>
                <a href="users/xoa/{{$t->id}}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure you want to delete this?')">
                  <i class="fas fa-trash"></i>
                </a>
                </td>
            </tr>
          </tbody>
          @endforeach
        </table>

        <p class="pull-left">Total {{count($account)}} contact.</p>
        {{$account->links()}}
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<script src="source/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="source/js/demo/datatables-demo.js"></script>

@endsection
