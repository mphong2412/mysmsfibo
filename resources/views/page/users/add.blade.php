@extends('master')
@section('content')
<div class="md-6" style="border:solid">
    @if(count($errors) > 0)
    <div class="elert alert-danger">
      @foreach($errors->all() as $err)
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{$err}} <br>
      @endforeach
    </div>
    @endif
<form action="users/add" method="POST">

  <div id="content" class="container">
      <center><h2>Add New User</h2></center>
      <!-- <form action="" method="POST"> -->
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="col-md-12">
        <div class="col-md-2" id="label" style="float:left">
            <label style="margin-top:3px">Staus:</label><br>
            <label style="margin-top:3px">* Username:</label><br>
            <label style="margin-top:3px">* Fullname:</label><br>
            <label style="margin-top:3px">* Password: </label><br>
            <label style="margin-top:3px">Api user: </label><br>
            <label style="margin-top:3px">Api Password: </label><br>
            <label style="margin-top:3px">* Email : </label><br>
            <label style="margin-top:3px">* Phone: </label><br>
            <label style="margin-top:3px">Company: </label><br>
            <label style="margin-top:3px">Address: </label><br>
            <label style="margin-top:3px">Limit SMS: </label><br>
            <label style="margin-top:3px">Authority: </label>
        </div>
        <div class="col-md-10" id="input" style="float:right">

            <select name="status" id="status" style="width:200px;margin-top:5px">
             <option value="1">Active</option>
             <option value="2">Unactive</option>
            </select><br>

            <input type="text" name="txtUname" style="margin-top:5px" size="50px"><br>

            <input type="text" name="txtFname" style="margin-top:5px" size="50px"><br>

            <input type="password" name="txtPass" style="margin-top:5px" size="50px"><br>

            <input type="text" name="txtApiU" style="margin-top:5px" size="50px"><br>

            <input type="password" name="txtApiP" value="" style="margin-top:5px" size="50px"><br>

            <input type="email" name="txtEmail" value="" style="margin-top:5px" size="50px"><br>

            <input type="tel" id="phone" name="txtPhone" size="50px" style="margin-top:5px" pattern="^\+?(?:[0-9]??).{5,14}[0-9]$" title="Please enter phone number."/><br>

            <input type="text" name="txtCompa" style="margin-top:5px" size="50px"><br>

            <input type="text" name="txtAddress" style="margin-top:5px" size="50px"><br>

            <input type="number" name="txtLimit" min="0" style="margin-top:5px" size="50px"><br>

            <select name="role" id="role" style="width:200px;margin-top:5px">
                <option></option>
                <option value="1">Admin</option>
                <option value="2">User</option>
                <option value="3">Sub user</option>
            </select>
            </div>
        </div>
  </div>


<button class="btn btn-info" type="reset" style="margin: 10px" onclick="window.location.href='users/list'">
  <i class="fas fa-times fa-sm"> Cancel</i>
</button>
  <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Save</button>

</form>
</div>

@endsection
