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
<form action="users/edit/{$account->id}" method="POST">

  <div id="content" class="container">
      <center><h2>Edit user information</h2></center>
      <!-- <form action="" method="POST"> -->
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="col-md-12">
        <div class="col-md-2" id="label" style="float:left">
            <label style="margin-top:2px">Staus:</label><br>
            <label style="margin-top:2px">* Username:</label><br>
            <label style="margin-top:2px">* Fullname:</label><br>
            <label style="margin-top:2px">* Password: </label><br>
            <label>New password: </label><br>
            <label>Confirm password</label><br>
            <label style="margin-top:2px">Api user: </label><br>
            <label style="margin-top:2px">Api Password: </label><br>
            <label style="margin-top:2px">* Email : </label><br>
            <label style="margin-top:2px">* Phone: </label><br>
            <label style="margin-top:2px">Company: </label><br>
            <label style="margin-top:2px">Address: </label><br>
            <label style="margin-top:2px">Limit SMS: </label>
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

            <input type="text" name="newpass" value="" style="margin-top:5px" size="50px"><br>
            
            <input type="text" name="renewpass" value="" style="margin-top:5px" size="50px"><br>

            <input type="text" name="txtApiU" value="{{$account->user_api}}" style="margin-top:5px" size="50px"><br>

            <input type="password" name="txtApiP" value="{{$account->user_pass}}" style="margin-top:5px" size="50px"><br>

            <input type="email" name="txtEmail" value="{{$account->email}}" style="margin-top:5px" size="50px"><br>

            <input type="tel" id="phone" name="txtPhone" value="{{$account->phone}}" size="50px" style="margin-top:5px" pattern="^\+?(?:[0-9]??).{5,14}[0-9]$" title="Please enter phone number."/><br>

            <input type="text" name="txtCompa" value="{{$account->company}}" style="margin-top:5px" size="50px"><br>

            <input type="text" name="txtAddress" value="{{$account->address}}" style="margin-top:5px" size="50px"><br>

            <input type="number" name="txtLimit" value="{{$account->limit_sms}}" min="0" style="margin-top:5px" size="50px"><br>

            </div>
        </div>
  </div>


<button class="btn btn-info" type="reset" style="margin: 10px" onclick="window.location.href='users/list'">
  <i class="fas fa-times fa-sm"> Cancel</i>
</button>
  <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Save</button>
<button class="btn btn-info" type="button" name="btnPass" id="btnPass" onclick="myP()">Change Password</button><br />
<center>
    <div class="col-sm-8" id="p1" style="display:none">
        <div class="col-sm-3" style="float">
            <label>Old password: </label><br>

        </div>
        <div class="col-sm-5">

        </div>
    </div>
</center>
</form>
</div>
<script type="text/javascript">

function myP(){
    var x = document.getElementById("p1");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
}
</script>
@endsection
