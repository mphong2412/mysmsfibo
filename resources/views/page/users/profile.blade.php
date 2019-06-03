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
<form action="users/profile/{$account->id}" method="POST">

  <div id="content" class="container">
      <center><h2>Edit user information</h2></center>
      <!-- <form action="" method="POST"> -->
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="col-md-12">
        <div class="col-md-2" id="label" style="float:left">
            <label style="margin-top:3px">Staus:</label><br>
            <label style="margin-top:3px">* Username:</label><br>
            <label style="margin-top:3px">* Fullname:</label><br>
            <label style="margin-top:3px">* Password: </label><br>
            <label style="margin-top:3px">New password: </label><br>
            <label style="margin-top:3px">Confirm password</label><br>
            <label style="margin-top:3px">Api user: </label><br>
            <label style="margin-top:3px">Api Password: </label><br>
            <label style="margin-top:3px">* Email : </label><br>
            <label style="margin-top:3px">* Phone: </label><br>
            <label style="margin-top:3px">Company: </label><br>
            <label style="margin-top:3px">Address: </label><br>
            <label style="margin-top:3px">Limit SMS: </label><br>
            <label style="margin-top:2px">Authority: </label>
        </div>
        <div class="col-md-10" id="input" style="float:right">

            <select name="status" id="status" style="width:200px;margin-top:5px">
            @if($account->status == 1)
             <option value="1">Active</option>@endif
            @if($account->status == 2)
             <option value="2">Unactive</option>@endif
            </select><br>

            <input type="text" name="txtUname" value="{{$account->username}}" style="margin-top:5px" size="50px" readonly><br>

            <input type="text" name="txtFname" value="{{$account->fullname}}" style="margin-top:5px" size="50px"><br>

            <input type="password" name="txtPass" value="" placeholder="enter your old password" style="margin-top:5px" size="50px"><br>

            <input type="password" name="newpass" id="npass" value="" style="margin-top:5px" size="50px" disabled><br>

            <input type="password" name="renewpass" id="rnpass" value="" style="margin-top:5px" size="50px" disabled><br>

            <input type="text" name="txtApiU" value="{{$account->user_api}}" style="margin-top:5px" size="50px"><br>

            <input type="password" name="txtApiP" value="{{$account->user_pass}}" style="margin-top:5px" size="50px"><br>

            <input type="email" name="txtEmail" value="{{$account->email}}" style="margin-top:5px" size="50px"><br>

            <input type="tel" id="phone" name="txtPhone" value="{{$account->phone}}" size="50px" style="margin-top:5px" pattern="^\+?(?:[0-9]??).{5,14}[0-9]$" title="Please enter phone number."/><br>

            <input type="text" name="txtCompa" value="{{$account->company}}" style="margin-top:5px" size="50px"><br>

            <input type="text" name="txtAddress" value="{{$account->address}}" style="margin-top:5px" size="50px"><br>

            <input type="number" name="txtLimit" value="{{$account->limit_sms}}" min="0" style="margin-top:5px" size="50px"><br>

            <select name="role" id="role" style="width:200px;margin-top:10px" disabled>
                @if($account->status == 1)
                 <option value="1">Admin</option>@endif
                @if($account->status == 2)
                 <option value="2">User</option>@endif
                 @if($account->status == 3)
                  <option value="3">Sub user</option>@endif
            </select>

            </div>
        </div>
  </div>


<button class="btn btn-info" type="reset" style="margin: 10px" onclick="window.location.href='users/list'">
  <i class="fas fa-times fa-sm"> Cancel</i>
</button>
  <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Save</button>
  <input type="checkbox" name="pupil" id="pupil" onclick="myP()">Change password
<!-- <button class="btn btn-info" type="button" name="btnPass" id="btnPass" onclick="myP()">Change Password</button><br /> -->
</form>
</div>
<script type="text/javascript">

function myP(){
if (document.getElementById('pupil').checked == true)
  {
	document.getElementById('npass').removeAttribute('disabled');
    document.getElementById('rnpass').removeAttribute('disabled');
 }
else
  {
   	document.getElementById('npass').removeAttribute('disabled','disabled');
 	document.getElementById('rnpass').removeAttribute('disabled','disabled');
}
}
</script>
@endsection
