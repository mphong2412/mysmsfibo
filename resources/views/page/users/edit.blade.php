@extends('master')
@section('content')
<div class="md-6" style="border:solid">
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
<form action="users/edit/{{$account->id}}" method="POST">

  <div id="content" class="container">
      <center><h2>Edit user information</h2></center>
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="col-md-12">
        <div class="col-md-2" id="label" style="float:left">
            <label style="margin-top:3px">Staus:</label><br>
            <label style="margin-top:3px">* Username:</label><br>
            <label style="margin-top:3px">* Fullname:</label><br>
            <label style="margin-top:3px">Api user: </label><br>
            <label style="margin-top:3px">Api Password: </label><br>
            <label style="margin-top:3px">* Email : </label><br>
            <label style="margin-top:3px">* Phone: </label><br>
            <label style="margin-top:3px">Company: </label><br>
            <label style="margin-top:3px">Address: </label><br>
            <label style="margin-top:3px">Limit SMS: </label><br>
            <label style="margin-top:2px">Authority: </label><br>
            <label style="margin-top:3px; display:none" id="lpass">Password: </label>
        </div>
        <div class="col-md-10" id="input" style="float:right">

            <select name="status" id="status" style="width:200px;margin-top:5px">
            @if($account->status == 1)
             <option value="1">Active</option>
             <option value="2">Unactive</option>@endif
            @if($account->status == 2)
             <option value="2">Unactive</option>
             <option value="1">Active</option>@endif
            </select><br>

            <input type="text" name="txtUname" value="{{$account->username}}" style="margin-top:5px" size="50px" readonly><br>

            <input type="text" name="txtFname" value="{{$account->fullname}}" style="margin-top:5px" size="50px"><br>



            <input type="text" name="txtApiU" value="{{$account->user_api}}" style="margin-top:5px" size="50px"><br>

            <input type="password" name="txtApiP" value="{{$account->user_pass}}" style="margin-top:5px" size="50px"><br>

            <input type="email" name="txtEmail" value="{{$account->email}}" style="margin-top:5px" size="50px"readonly><br>

            <input type="tel" id="phone" name="txtPhone" value="{{$account->phone}}" size="50px" style="margin-top:5px" pattern="^\+?(?:[0-9]??).{5,14}[0-9]$" title="Please enter phone number."/><br>

            <input type="text" name="txtCompa" value="{{$account->company}}" style="margin-top:5px" size="50px"><br>

            <input type="text" name="txtAddress" value="{{$account->address}}" style="margin-top:5px" size="50px"><br>

            <input type="number" name="txtLimit" value="{{$account->limit_sms}}" min="0" style="margin-top:5px" size="50px"><br>

            <select name="role" id="role" style="width:200px;margin-top:10px">
                @if($account->role == 1)
                 <option value="1">Admin</option>
                 <option></option>
                 <option value="2">User</option>
                 <option value="3">Sub user</option>@endif
                @if($account->role == 2)
                 <option value="2">User</option>
                 <option></option>
                 <option value="3">Sub user</option>@endif
                 @if($account->role == 3)
                  <option value="3">Sub user</option>
                  <option></option>
                  <option value="2">User</option>@endif
            </select><br>
            <input type="password" name="txtPass" id="txtPass" style="margin-top:5px; display:none" size="50px" />
            </div>
        </div>
  </div>

  <!-- button cancel -->
  <button class="btn btn-info" type="reset" style="margin: 10px" onclick="window.location.href='users/list'">
  <i class="fas fa-times fa-sm"> Cancel</i></button>

  <!-- button save -->
  <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Save</button>

  <!-- checkbox change password -->
  <input type="checkbox" name="ip1" id="ip1"> Reset password
</form>
</div>

<script>
document.getElementById('ip1').onchange = function() {
    if(this.checked){
    document.getElementById('txtPass').style.display = '';
    document.getElementById('lpass').style.display = '';
}else {
    document.getElementById('txtPass').style.display = 'none';
    document.getElementById('lpass').style.display = 'none';
}
};
</script>
@endsection
