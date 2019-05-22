@extends('master')
@section('content')

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Group Contacts Managerment</h1>

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
              <button class="btn btn-success" type="button" style="margin-left: 10px" data-toggle="modal" data-target="#myModal">
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
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Seq</th>
              <th>Name</th>
              <th>Description</th>
              <th>Actions</th>
            </tr>
          </thead>
          @foreach($groups as $t)
          <tbody>
            <tr>
              <td>{{$t->id}}</td>
              <td>{{$t->name_group}}</td>
              <td>{{$t->description}}</td>
              <td>
                <button class="btn btn-warning btn-warning btn-circle btn-sm" onclick="window.location.href=''">
                  <i class="fas fa-edit"></i>
                </button>
                <a href="" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure you want to delete this?')">
                  <i class="fas fa-trash"></i>
                </a>
            </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        <p class="pull-left">Total {{count($groups)}}.</p>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<!-- add new group -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Group Infomation</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="col-sm-12">
                <label>*Group Name: </label>
                <input type="text" id="ngroup" name="txtGroup" size="50px"><br>
                <label style="margin-left:18px">Description: </label>
                <input type="textarea" id="gdesc" name="txtDesc" size="50px" >
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success fas fa-save fa-sm"> Save</button>
        </div>

      </div>
    </div>
  </div>

<script>
    $(document).ready(function(){
        $('#insert_form').on('submit',function(event){
            event.preventDefault();
            if($('#txtGroup').val()==''){
                arlert('Group Name is required');
            }else {
                $.ajax({

                });
            }
        });
    });

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="source/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="source/js/demo/datatables-demo.js"></script>
@endsection
