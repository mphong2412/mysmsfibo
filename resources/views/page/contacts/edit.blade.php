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
<form action="contacts/edit/{{$contacts->id}}" method="POST">

  <div id="content" class="container">
      <center><h2>Edit Contact</h2></center>
      <!-- <form action="" method="POST"> -->
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="col-md-12">
        <div class="col-md-2" id="label" style="float:left">
            <label >* Group:</label><br>
            <label style="margin-top:2px">* Phone:</label><br>
            <label style="margin-top:2px">Name:</label><br>
            <label style="margin-top:2px">Sex : </label><br>
            <label style="margin-top:2px">Email: </label><br>
            <label style="margin-top:2px">Date of Birth: </label><br>
            <label style="margin-top:2px">City : </label><br>
            <label style="margin-top:2px">Address: </label><br>
            <label style="margin-top:2px">Status: </label>
        </div>
        <div class="col-md-10" id="input" style="float:right">
            <select name="gname" id="gname" style="width:200px" >
            <option ></option>
             @foreach($contact_groups as $g)
             <option
             @if($contacts->contact_groups->id == $g->id)
             {{"selected"}}
            @endif
                value="{{$g->id}}">{{$g->name}}</option>
             @endforeach
         </select><br>

            <input type="text" id="phone" name="txtPhone" value="{{$contacts->phone}}" size="50px" style="margin-top:5px" pattern="[0-9}" title="Please enter phone number."/><br>

            <input type="text" id="name" name="txtName" value="{{$contacts->full_name}}" style="margin-top:5px" size="50px"/><br>

            <input type="radio" name="gender" value="0" style="margin-top:5px"> Male |
            <input type="radio" name="gender" value="1" style="margin-top:5px"> Female<br>

            <input type="email" id="email" name="email" size="50px" style="margin-top:5px" value="{{$contacts->email}}"><br>

            <input type="date" id="doB" value="{{$contacts->birthday}}" name="doB" placeholder="Choose" style="margin-top:5px; width:200px"><br>

            <select name="city" id="city" style="width:200px;margin-top:5px">
            <option></option>
             @foreach($city as $t)
             <option
             @if($contacts->city_id == $t->id)
             {{"selected"}}
             @endif
              value="{{$t->id}}">{{$t->name}}</option>
             @endforeach
            </select><br>

            <input type="text" name="address" value="{{$contacts->address}}" id="address" size="50px" style="margin-top:5px"/><br>

            <select name="status" id="status" style="width:200px;margin-top:5px">
            @if($contacts->status == 1)
             <option value="1">Using</option>
            @endif

            @if($contacts->status == 2)
             <option value="2">Paused</option>
            @endif

            @if($contacts->status == 3)
             <option value="3">Stopped</option>
             @endif
         </select><br>
        </div>
        </div>
  </div>


<button class="btn btn-info" type="reset" style="margin: 10px" onclick="window.location.href='contacts/list'">
  <i class="fas fa-times fa-sm"> Cancel</i>
</button>
  <button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Save</button>

</form>
</div>

@endsection
