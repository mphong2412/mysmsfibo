@extends('master')
@section('content')
<div class="md-6" style="border:solid">
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
<form action="users/profile/{{$account->id}}" method="POST">

  <div id="content" class="container">
      <center><h2>Account information</h2></center>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="col-md-12">
        <div class="col-md-2" id="label" style="float:left">
            <label style="margin-top:5%">* Username:</label><br>
            <label style="margin-top:5%">* Fullname:</label><br>
            <label style="margin-top:5%">Api user: </label><br>
            <label style="margin-top:5%">Api Password: </label><br>
            <label style="margin-top:5%">* Email : </label><br>
            <label style="margin-top:5%">Limit SMS: </label><br>
        </div>
        <div class="col-md-10" id="input" style="float:right">

            <input type="text" name="txtUname" value="{{$account->username}}" style="margin-top:1%" size="50%" disabled><br>

            <input type="text" name="txtFname" value="{{$account->fullname}}" style="margin-top:1%" size="50%"><br>

            <input type="text" name="txtApiU" value="{{$account->user_api}}" style="margin-top:1%" size="50%" disabled><br>

            <input type="password" name="txtApiP" value="{{$account->user_pass}}" style="margin-top:1%" size="50%" disabled><br>

            <input type="email" name="txtEmail" value="{{$account->email}}" style="margin-top:1%" size="50%"><br>

            <input type="number" name="txtLimit" value="{{$account->limit_sms}}" min="0" style="margin-top:1%" size="50%" disabled><br>
            </div>
        </div>
  </div>


<button class="btn btn-warning" type="reset" style="margin: 10px" onclick="window.location.href='index'">
  <i class="fas fa-times fa-sm"> Cancel</i>
</button>
  <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Save</button>
  <a href="#myModal" role="button" class="btn btn-md btn-primary" data-toggle="modal">Change password</a>
</form>
</div>

<div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label>Old password</label>
                    <input type="password" name="txtPass" value="" placeholder="enter your old password" size="50%">

                    <label>New password</label>
                    <input type="password" name="newpass" id="npass" value="" size="50%">

                    <br /><label>Confirm password</label>
                    <input type="password" name="renewpass" id="rnpass" value="" size="50%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
