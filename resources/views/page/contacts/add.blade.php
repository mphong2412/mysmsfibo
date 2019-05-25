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
<form action="contacts/add" method="POST">

  <div class="container">
      <h2>Add New Contact</h2>
      <!-- <form action="" method="POST"> -->
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="col-sm-12">* Group:
        <select name="gname" id="gname" style="margin-left:10px;width:100px" >
         @foreach($contact as $t)
         <option value="{{$t->contact_groups_id}}">{{$t->contact_groups->name}}</option>
         @endforeach
       </select>
        </div><br>
        <div class="col-sm-12">
            <label>* Phone:</label>
            <input type="text" id="phone" name="txtPhone" size="80px"  pattern="{0-9}" title="Please enter phone number."><br><br>

            <label>Name:</label>
            <input type="text" id="name" name="txtName" size="80px" style="margin-left:10px"><br><br>

            <label>Sex : </label>
            <input type="radio" name="gender" value="male" style="margin-left:20px"> Male | 
            <input type="radio" name="gender" value="female"> Female
        </div>
  </div>

<button class="btn btn-info" type="reset" style="margin: 10px" onclick="window.location.href='contacts/list'">
  <i class="fas fa-times fa-sm"> Cancel</i>
</button>
  <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Save</button>

</form>
</div>

@endsection
