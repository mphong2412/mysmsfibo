@extends('master')
@section('content')
<div class="container-fluid">
    <h2 class="h3 mb-2 text-gray-800">Thông tin tài khoản</h2>
    <div class="md-6">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{$err}} <br>
                @endforeach
        </div>
        @endif
        @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}<button type="button" class="close" data-dismiss="alert">&times;</button></div>
        @endif
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="users/profile" method="POST">
                        <div id="content" class="container">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="col-md-12">
                                <div class="col-md-2" id="label" style="float:left">
                                    <label style="margin-top:10%">(*)Tên đăng nhập:</label><br>
                                    <label style="margin-top:10%">(*)Họ tên:</label><br>
                                    <label style="margin-top:10%">Api người dùng: </label><br>
                                    <label style="margin-top:10%">Mật khẩu api: </label><br>
                                    <label style="margin-top:10%">(*)Email : </label><br>
                                    <label style="margin-top:10%">Số lượng tin nhắn: </label><br>
                                    <label style="margin-top:10%;display:none" id="oldpass">Mật khẩu hiện tại: </label><br>
                                    <label style="margin-top:10%;display:none" id="newpa">Mật khẩu mới: </label><br>
                                </div>
                                <div class="col-md-10" id="input" style="float:right">

                                    <input class="form-control" type="text" name="txtUname" value="{{$account->username}}" style="margin-top:1%;width:50%" disabled>

                                    <input class="form-control" type="text" name="txtFname" value="{{$account->fullname}}" style="margin-top:1%;width:50%">

                                    <input class="form-control" type="text" name="txtApiU" value="{{$account->user_api}}" style="margin-top:1%;width:50%" disabled>

                                    <input class="form-control" type="password" name="txtApiP" value="{{$account->user_pass}}" style="margin-top:1%;width:50%" disabled>

                                    <input class="form-control" type="email" name="txtEmail" value="{{$account->email}}" style="margin-top:1%;width:50%">

                                    <input class="form-control" type="number" name="txtLimit" value="{{$account->limit_sms}}" min="0" style="margin-top:1%;width:50%" disabled>

                                    <input class="form-control" type="password" name="txtPass" id="txtPass" style="margin-top:1%;width:50% ;display:none" placeholder="nhập mật khẩu hiện tại">

                                    <input class="form-control" type="password" name="newpass" id="newpass" style="margin-top:1%;width:50%;display:none" placeholder="nhập mật khẩu mới" id="npass">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-warning" type="reset" style="margin: 10px" onclick="window.location.href='index'">
                            <i class="fas fa-times fa-sm"> Hủy</i>
                        </button>
                        <button type="submit" class="btn btn-success fas fa-save fa-sm" style="margin: 10px"> Lưu</button>
                        <input type="checkbox" name="btnrpass" id="btnrpass">Đổi mật khẩu
                    </form>
                </div><!-- /.table-responsive -->
            </div><!-- /.card-body -->
        </div><!-- /.card-shadow -->
    </div><!-- /.md-6 -->
</div> <!-- /.container-fluid -->

<script type="text/javascript">
    document.getElementById('btnrpass').onchange = function() {
        if (this.checked) {
            document.getElementById('oldpass').style.display = '';
            document.getElementById('newpa').style.display = '';
            document.getElementById('txtPass').style.display = '';
            document.getElementById('newpass').style.display = '';
        } else {
            document.getElementById('oldpass').style.display = 'none';
            document.getElementById('newpa').style.display = 'none';
            document.getElementById('txtPass').style.display = 'none';
            document.getElementById('newpass').style.display = 'none';
        }
    };
</script>
@endsection
