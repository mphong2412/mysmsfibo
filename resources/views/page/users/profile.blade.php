@extends('master')
@section('content')
<div class="container-fluid">
    <h2 class="h3 mb-2 text-gray-800">Account information</h2>
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
            {{session('thongbao')}}</div>
        @endif
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <form action="users/profile" method="POST">
                        <div id="content" class="container">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="col-md-12">
                                <div class="col-md-2" id="label" style="float:left">
                                    <label style="margin-top:5%">* Username:</label><br>
                                    <label style="margin-top:5%">* Fullname:</label><br>
                                    <label style="margin-top:5%">Api user: </label><br>
                                    <label style="margin-top:5%">Api Password: </label><br>
                                    <label style="margin-top:5%">* Email : </label><br>
                                    <label style="margin-top:5%">Limit SMS: </label><br>
                                    <label style="margin-top:5%;display:none" id="oldpass">Old password: </label><br>
                                    <label style="margin-top:5%;display:none" id="newpa">New password: </label><br>
                                </div>
                                <div class="col-md-10" id="input" style="float:right">

                                    <input type="text" name="txtUname" value="{{$account->username}}" style="margin-top:1%" size="50%" disabled><br>

                                    <input type="text" name="txtFname" value="{{$account->fullname}}" style="margin-top:1%" size="50%"><br>

                                    <input type="text" name="txtApiU" value="{{$account->user_api}}" style="margin-top:1%" size="50%" disabled><br>

                                    <input type="password" name="txtApiP" value="{{$account->user_pass}}" style="margin-top:1%" size="50%" disabled><br>

                                    <input type="email" name="txtEmail" value="{{$account->email}}" style="margin-top:1%" size="50%"><br>

                                    <input type="number" name="txtLimit" value="{{$account->limit_sms}}" min="0" style="margin-top:1%" size="50%" disabled><br>

                                    <input type="password" name="txtPass" id="txtPass" style="margin-top:1% ;display:none" placeholder="enter your old password" size="50%"><br>

                                    <input type="password" name="newpass" id="newpass" style="margin-top:1%;display:none" id="npass" size="50%">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-warning" type="reset" style="margin: 10px" onclick="window.location.href='index'">
                            <i class="fas fa-times fa-sm"> Cancel</i>
                        </button>
                        <button type="submit" class="btn btn-success fas fa-save fa-sm" style="margin: 10px"> Save</button>
                        <input type="checkbox" name="btnrpass" id="btnrpass">Change password
                    </form>
                </div>
            </div>
        </div>
    </div>

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
