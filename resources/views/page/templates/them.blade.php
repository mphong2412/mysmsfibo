@extends('master')
@section('content')
<div class="container-fluid">
    <div class="md-6">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)

                {{$err}}<button type="button" class="close" data-dismiss="alert">&times;</button> <br>
                @endforeach
        </div>
        @endif
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="templates/them" method="POST">

                        <div class="container">
                            <h2>Thông tin mẫu tin</h2>

                            <input type="hidden" name="_token" value="{{csrf_token()}}" />

                            <div class="col-sm-12">Dịch vụ:
                                <input class="typeahead form-control" type="text" id="txtService" name="txtService" size="80px" pattern="[A-Z]{0,15}" title="Please enter capital letters or enter number."></div><br>

                            <div class="col-sm-12">Mẫu tin:
                                <input class="form-control" type="textarea" id="Template" name="txtTemplate" size="80px" pattern="[a-Z]{1,15}"></div><br>

                            <button class="btn btn-success" type="button" style="margin: 5px" data-toggle="modal" data-target="#ModalAddUser">
                                <i class="fas fa-plus fa-sm"> Thêm mới user</i>
                            </button> <br><br>
                        </div>
                        <table class="table table-bordered" id="dataTable" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="20%">STT</th>
                                    <th width="20%">Tên</th>
                                    <th width="20%">Email</th>
                                    <th width="20%">Số điện thoại</th>
                                    <th width="20%">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tbody>
                        </table><br>
                        <button class="btn btn-success" type="reset" style="margin: 10px" onclick="window.location.href='templates'">
                            <i class="fas fa-times fa-sm"> Hủy</i>
                        </button>
                        <button type="submit" class="btn btn-success fas fa-save fa-sm" style="margin: 10px"> Lưu</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
    </div>

    <div id="ModalAddUser" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Người dùng</h1>
                </div>
                <div class="modal-body">
                    <form method="post" action="modaltu">
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Tìm kiếm</label>
                            <div>
                                <input type="search" onkeyup="myFunction()" class="form-control input-lg" name="su" id="su">
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <div>
                                <button type="submit" id="sbtu" class="btn btn-success">Tìm kiếm</button>
                            </div>
                        </div> --}}
                    </form>
                    <table class="table table-striped table-bordered table-md" id="tbUser" width="100%" height="10%">
                        <thead class="thead-dark">
                            <tr>
                                <th width="25%">Tên</th>
                                <th width="25%">Email</th>
                                <th width="25%">Số điện thoại</th>
                                <th width="25%">Hành động</th>
                            </tr>
                        </thead>
                        @foreach ($account as $value)
                        <tbody>
                            <td>{{$value->username}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->phone}}</td>
                            <td>
                                <button class="btn btn-success btn-circle btn-sm" id="addtu" name="addtu" onclick="test( {{ "'" . $value->username . "'"}},   {{ "'" . $value->email . "'" }}, {{ "'" . $value->phone . "'" }})" >
                                    <i class="fas fa-plus"></i>
                                </button>
                            </td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script type="text/javascript">
        function myFunction() {
            input = document.getElementById("su");
            filter = input.value.toUpperCase();
            table = document.getElementById("tbUser");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function test(name, phone, email) {
            
            console.log(name, phone, email);
        }
    </script>
    @endsection
