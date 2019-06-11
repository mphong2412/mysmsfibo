@extends('master')
@section('content')
<div class="container-fluid">
    <div class="md-6">
        @if(count($errors) > 0)
            <div class="elert alert-danger">
                @foreach($errors->all() as $err)
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{$err}} <br>
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
                            </button> <br>
                        </div>
                        <table class="table table-bordered" id="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th width="20%">STT</th>
                                    <th width="20%">Tên</th>
                                    <th width="20%">Email</th>
                                    <th width="20%">Số điện thoại</th>
                                    <th width="20%">Hành động</th>
                                </tr>
                            </thead>
                            <tbody style="display:none">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Login</h1>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">E-Mail Address</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">Login</button>

                            <a class="btn btn-link" href="">Forgot Your Password?</a>
                        </div>
                    </div>
                </form>
                <h1>Or Signup!</h1>
                <form role="form" method="POST" action="">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="name" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">E-Mail Address</label>
                        <div>
                            <input type="email" class="form-control input-lg" name="email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Confirm Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-success">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
