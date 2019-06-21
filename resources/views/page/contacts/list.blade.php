@extends('master')
@section('content')

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý danh bạ</h1>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}}<button type="button" class="close" data-dismiss="alert">&times;</button>
            @endforeach

    </div>
    @endif
    @if(session('thongbao'))
    <div class="alert alert-success">
        {{session('thongbao')}}
        <button type="button" class="close" data-dismiss="alert">&times;</button></div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <form action="searchc" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="search" name="key" class="form-control bg-light border-0 small" placeholder="Search for..." />
                        <div class="input-group-append" style="margin-bottom: 10px">

                            <button class="btn btn-primary" type="submit" style="margin-left: 10px">
                                <i class="fas fa-search fa-sm"> Tìm Kiếm</i>
                            </button>

                            <a href="contacts/add"><button class="btn btn-success" type="button" style="margin-left: 10px">
                                    <i class="fas fa-plus fa-sm"> Thêm Mới</i>
                                </button></a>

                            <button type="button" class="btn btn-success" id="showmore" style="margin-left: 10px" onclick="myFunction()">Thêm cột dữ liệu</button>

                            <a href="{{route('contact.export')}}"><button class="btn btn-success" type="button" id="print" style="margin-left: 10px">
                                    <i class="fas fa-print fa-sm"> Xuất File</i>
                                </button></a>

                            <button class="btn btn-success" type="button" onclick="myImp()" id="import" style="margin-left: 10px">
                                <i class="fas fa-upload fa-sm"> Nhập File</i>
                            </button>
                        </div>
                    </div>
                    <!-- Hiển thị cột ẩn trong table -->
                    <div class="col-md-12">
                        <br>
                        <div class="form-group" id="showoption" style="display:none">
                            Email: <input type="checkbox" id="myCheck" onclick="addRow()" name="cb"> |
                            Sinh Nhật: <input type="checkbox" id="myCheck1" onclick="addRow1()" name="cb1"> |
                            Ngày Tạo: <input type="checkbox" id="myCheck2" onclick="addRow2()" name="cb2"> |
                            Ngày Update: <input type="checkbox" id="myCheck3" onclick="addRow3()" name="cb3">
                        </div>
                    </div>
                </form>
                <!-- Import file -->
                <form class="form-horizontal" id="imp1" action="{{route('contact.import')}}" method="post" style="display:none" enctype="multipart/form-data">
                    @csrf
                    Nhóm : <select name="abc" id="gr1">
                        <option></option>
                        @foreach($contact_groups as $g)
                        <option value="{{$g->id}}">{{$g->name}}</option>
                        @endforeach
                    </select>
                    <input type="file" name="input1" id="input1">

                    <input type="submit" name="btnimp" value="Import">
                    <a href="source/data.xlsx">File mẫu</a>

                </form><br />

                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr id="test">
                            <th width="10%">STT</th>
                            <th width="10%">Sô điện thoại</th>
                            <th width="10%">Họ tên</th>
                            <th width="10%" id="template" style="display:none">Email</th>
                            <th width="10%" id="birth" style="display:none">Ngày sinh</th>
                            <th width="10%" id="cre" style="display:none">Ngày tạo</th>
                            <th width="10%" id="upd" style="display:none">Ngày update</th>
                            <th width="10%">Nhóm</th>
                            <th width="10%">Hành động</th>
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
                            <td>{{$t->name}}</td>
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
                <p class="pull-left">Hiển thị {{count($contacts)}} danh bạ.</p>
                {{$contacts->links()}}
            </div><!-- /.table-responsive-->
        </div><!-- /.card-body -->
    </div><!-- /.card-shadow -->
</div> <!-- /.container-fluid -->

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
        if (checkBox.checked == true) {
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
        if (checkBox.checked == true) {
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
        if (checkBox.checked == true) {
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
        if (checkBox.checked == true) {
            text.style.display = "";
            $(".upd1").css("display", "");
        } else {
            text.style.display = "none";
            $(".upd1").css("display", "none");
        }
    }

    function myImp() {
        var x = document.getElementById("imp1");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
@endsection
