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
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append" style="margin-bottom: 10px">
              <button class="btn btn-primary" type="button" style="margin-left: 10px">
                <i class="fas fa-search fa-sm"> Search</i>
              </button>
              <a href=""><button class="btn btn-success" type="button" style="margin-left: 10px" >
                <i class="fas fa-plus fa-sm"> Add New</i>
              </button></a>
              <button class="btn btn-success" type="button" style="margin-left: 10px" >
                <i class="fas fa-print fa-sm"> Export</i>
              </button>

            </div>
          </div>
        </form>


        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0" >
          <thead>
            <tr id="test">
              <th>Seq</th>
              <th>Services</th>
              <th id="template" style="display: none">Template</th>

              <th>Actions</th>
            </tr>
          </thead>
          @foreach($contact as $t)
          <tbody>
            <tr id="test2">
              <td>{{$t->id}}</td>
              <td>{{$t->phone}}</td>
              <td class="template2" style="display: none">{{$t->full_name}}</td>
              <td>
                <button class="btn btn-warning btn-warning btn-circle btn-sm" onclick="window.location.href='templates/sua/{{$t->id}}'">
                  <i class="fas fa-edit"></i>
                </button>
                <a href="templates/xoa/{{$t->id}}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure you want to delete this?')">
                  <i class="fas fa-trash"></i>
                </a>
            </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        <p class="pull-left">Total {{count($contact)}} contact.</p>
      </div>
    </div>
  </div>
  <button type="button" onclick="addRow()" name="button">TEsst</button>
  <input type="checkbox" id="c2" onclick="addRow2()" name="button">TEsst</button>

</div>
<!-- /.container-fluid -->

<script src="source/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="source/js/demo/datatables-demo.js"></script>
<script type="text/javascript">
    function addRow() {
        // console.log(1111);
        //
        // var html = "<th>TESST</th>";
        // $('#test').append(html);
        //
        // var html2 = "<td>TESST</td>";
        // $('#test2').append(html);
        $("#template").css("display", "");
        $(".template2").css("display", "");

    }
    function addRow2() {
        // console.log(1111);
        //
        // var html = "<th>TESST</th>";
        // $('#test').append(html);
        //
        // var html2 = "<td>TESST</td>";
        // $('#test2').append(html);
        $("#template").css("display", "");
        $(".template2").css("display", "");

    }
</script>
@endsection
