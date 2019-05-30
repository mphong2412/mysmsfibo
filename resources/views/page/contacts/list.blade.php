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
        <form action="searchc" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
         <div class="input-group">
            <input type="search" name="key" class="form-control bg-light border-0 small" placeholder="Search for..."/>
            <div class="input-group-append" style="margin-bottom: 10px">

              <button class="btn btn-primary" type="submit" style="margin-left: 10px">
                <i class="fas fa-search fa-sm"> Search</i>
              </button>

              <a href="contacts/add"><button class="btn btn-success" type="button" style="margin-left: 10px" >
                <i class="fas fa-plus fa-sm"> Add New</i>
              </button></a>

              <button type="button" class="btn btn-success" id="showmore" style="margin-left: 10px" onclick="myFunction()">Add More Column</button>

              <a href="{{route('contact.export')}}"><button class="btn btn-success" type="button" id="print" style="margin-left: 10px" >
                <i class="fas fa-print fa-sm"> Export</i>
              </button></a>

              <button class="btn btn-success" type="button" onclick="myImp()" id="import" style="margin-left: 10px" >
                <i class="fas fa-upload fa-sm"> Import</i>
            </button>
            </div>
        </div>
        <!-- Hiển thị cột ẩn trong table -->
          <div class="col-md-12">
              <br>
              <div class="col-md-12" id="showoption" style="display:none">
                  Email: <input type="checkbox" id="myCheck" onclick="addRow()" name="cb"> |
                  BirthDay: <input type="checkbox" id="myCheck1" onclick="addRow1()" name="cb1"> |
                  Create Date: <input type="checkbox" id="myCheck2" onclick="addRow2()" name="cb2"> |
                  Update Date: <input type="checkbox" id="myCheck3" onclick="addRow3()" name="cb3">
              </div>
          </div>
        </form>
        <form class="form-horizontal" id="imp1" action="{{route('contact.import')}}" method="post" style="display:none"  enctype="multipart/form-data">
            @csrf
            <input type="file" name="input1" id="input1">

            <input type="submit" name="btnimp" value="Import">
            <a href="source/data.xlsx">Example import</a>

        </form><br />

        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0" >
          <thead>
            <tr id="test">
              <th>Seq</th>
              <th>Phone</th>
              <th>Full Name</th>
              <th id="template" style="display:none">Email</th>
              <th id="birth" style="display:none">Date Of Birth</th>
              <th id="cre" style="display:none">Create Date</th>
              <th id="upd" style="display:none">Update Date</th>
              <th>Group</th>
              <th>Actions</th>
            </tr>
          </thead>
          @foreach($contacts as $t)
          <tbody>
            <tr id="test2">
              <td>{{$t->id}}</td>
              <td>{{$t->phone}}</td>
              <td>{{$t->full_name}}</td>
              <td class="template2" style="display:none">{{$t->email}}</td>
              <td class="birth1" style="display:none">{{$t->birthday}}</td>
              <td class="cre1" style="display:none">{{$t->created_at}}</td>
              <td class="upd1" style="display:none">{{$t->updated_at}}</td>
              <td>{{$t->contact_groups->name}}</td>
              <td>
                <button class="btn btn-warning btn-warning btn-circle btn-sm" onclick="window.location.href='contacts/edit/{{$t->id}}'">
                  <i class="fas fa-edit"></i>
                </button>
                <a href="contacts/xoa/{{$t->id}}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure you want to delete this?')">
                  <i class="fas fa-trash"></i>
                </a>
                </td>
            </tr>
          </tbody>
          @endforeach
        </table>
        <p class="pull-left">Total {{count($contacts)}} contact.</p>
        {{$contacts->links()}}
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<script src="source/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="source/js/demo/datatables-demo.js"></script>

<script type="text/javascript">

function myFunction() {
  var x = document.getElementById("showoption");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

    function addRow() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("template");
        var text2 = document.getElementById("template2");
        if (checkBox.checked == true){
            text.style.display = "";
            $(".template2").css("display", "");
        } else {
            text.style.display = "none";
            $(".template2").css("display", "none");
        }
    }

    function addRow1() {
        var checkBox = document.getElementById("myCheck1");
        var text = document.getElementById("birth");
        if (checkBox.checked == true){
            text.style.display = "";
            $(".birth1").css("display", "");
        } else {
            text.style.display = "none";
            $(".birth1").css("display", "none");
        }
    }
    function addRow2() {
        var checkBox = document.getElementById("myCheck2");
        var text = document.getElementById("cre");
        if (checkBox.checked == true){
            text.style.display = "";
            $(".cre1").css("display", "");
        } else {
            text.style.display = "none";
            $(".cre1").css("display", "none");
        }
    }
    function addRow3() {
        var checkBox = document.getElementById("myCheck3");
        var text = document.getElementById("upd");
        if (checkBox.checked == true){
            text.style.display = "";
            $(".upd1").css("display", "");
        } else {
            text.style.display = "none";
            $(".upd1").css("display", "none");
        }
    }
    function myImp(){
        var x = document.getElementById("imp1");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
    }
</script>
@endsection
