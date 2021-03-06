@extends('master')
@section('content')
<div class="container-fluid">
    <div class="md-6">
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
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="services/add" method="POST">
                        <div class="container">
                            <h2>Thông tin dịch vụ</h2>
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="col-sm-12">Dịch vụ:
                                <input class="form-control" type="text" id="Service" name="txtName" style="width:45%;margin:1%" pattern="{A-Z}" title="Vui lòng nhập chữ in hoa hoặc số."></div>

                            <div class="col-sm-12">Mô tả:
                                <input class="form-control" type="textarea" id="Template" style="width:45%;margin:1%" name="txtDesc" size="80px"></div>

                            Người dùng có thể sử dụng dịch vụ: <button class="btn btn-success" type="button" style="margin: 1%" data-toggle="modal" data-target="#ModalAddUser">
                                <i class="fas fa-plus fa-sm"> Thêm mới user</i>
                            </button>
                        </div> <!-- /.container -->

                        <table class="table table-bordered" id="dataTable" width="100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th width="20%">Tên</th>
                                    <th width="20%">Email</th>
                                    <th width="20%">Số điện thoại</th>
                                    <th width="20%">Hành động</th>
                                </tr>
                            </thead>
                        </table><br>

                        <button class="btn btn-success" type="reset" style="margin: 10px" onclick="window.location.href='services'">
                            <i class="fas fa-times fa-sm"> Hủy</i>
                        </button>
                        <div class="aa" id="aa" name="aa" style="display:none">
                            <input type="text" id="total_input" name="total_input" value="0">
                        </div>
                        <button type="submit" class="btn btn-success fas fa-save fa-sm" style="margin: 10px"> Lưu</button>

                    </form>
                </div><!-- /.table-responsive -->
            </div><!-- /.card-body -->
        </div><!-- /.card-shadow -->
    </div><!-- /.md-6 -->
</div><!-- /.container-fluid -->

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
                            <button class="btn btn-success btn-circle btn-sm" id="addtu" name="addtu" onclick="test({{ "'" . $value->id . "'"}}, {{ "'" . $value->username . "'"}},   {{ "'" . $value->email . "'" }}, {{ "'" . $value->phone . "'" }})">
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

    var d = 0;

    function test(id, name, email, phone) {
        console.log(id, name, email, phone);
        $('#dataTable').append('<tr>' +
            '<td>' + name + '</td>' +
            '<td>' + email + '</td>' +
            '<td>' + phone + '</td>' +
            "<td><img src='source/img/del.png' data-user_id=" + d + " class='btnDelete'/></td>" +
            '</tr>');
        $(".btnDelete").bind("click", Delete);

        $('.aa').append('<input id="ids_' + d + '" name="id_' + d + '" type="text" value="' + id + '" />');
        d = d + 1;
        $('#total_input').val(d);

    }

    function Delete() {
        var input_id = $(this).data('user_id');
        var par = $(this).parent().parent(); //tr
        par.remove();
        $('#ids_' + input_id).remove();
    };

    $(function() {
        $(".btnDelete").bind("click", Delete);
    });
    function show() {
        var myTab = document.getElementById('tbUser');
    }
</script>
@endsection
