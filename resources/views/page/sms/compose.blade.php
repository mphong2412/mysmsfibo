@extends('master')
@section('content')
<link href="source/css/style.css" rel="stylesheet">
<div class="formCompose">
<div class="">
  <div style="background-color: white; padding-bottom: 0px">
    <ul class="">
      <li>
        <span class="">Compose</span>
      </li>
    </ul>
  </div>
</div>

<div class="textForm" >
  <!-- <div class="" style="width: 90%; height: 80%; margin-left: 5%;"> -->
    <div class="" style="width:100%; height: 10%; background-color: #FAFAFA;">
      <div class="" style="padding: 10px;font-size: 25px">
        <span class="" style="padding-left: 10%">Receiveds</span>
        <span class="" style="padding-left: 18%">Compose</span>
        <span class="" style="padding-left: 18%">Finish</span>
      </div>
    </div></br>

    @csrf
    @if(count($errors))
        <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.
          <br/>
          <ul>
            @foreach($errors->all() as $error)
              {{$error}}<button type="button" class="close" data-dismiss="alert">&times;</button>
            @endforeach
          </ul>
        </div>
    @endif
    @if(session('thongbao'))
      <div class="alert alert-success">
        {{session('thongbao')}}
      <button type="button" class="close" data-dismiss="alert">&times;</button></div>
    @endif

  

    <form action="" method="post" autocomplete="off" id="formCompose">


    <div class="toggle-input">Input Phone Number</div>
    <div class="input-phone">
      <textarea  placeholder="Input phone number" rows="20" name="mobile" id="comment_text" cols="40" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea><br>
      <button class="myButton" id="comment_text" onclick="Test()">Submit</button>
    </div>
  </form>

    <!--  -->
  <form action="{{route('compose.import')}}" method="post" id="formCompose" enctype="multipart/form-data">
    @csrf
    <div class="toggle-excel">Input From Excel</div>
    <div class="input-excel">
      <div "example-import">
        <input type="file" class="file" id="inputfile" name="inputfile" />
        <button type="submit" id="btnImport" nam="btnImport" class="myButton" >Submit</button>
        <a class="example-import" href="/source/data.xlsx">Sample Template</a>
      </div>
    </div>
  </form>

  <form action="" id="formCompose">
    <div class="toggle-group">Input From Group</div>
    <div class="select-box">
      <label for="select-box1" class="label select-box1"><span class="label-desc">Choose your country</span> </label>
      <button class="myButton" type="submit"  id="inputGroup">Submit</button>
      <select id="select-box1" class="select">
        <option value="Choice 1"></option>

      </select>
    </div>
  </form>

    <div class="table-wrapper">
      <table class="fl-table" name="listcontact" id="tableid" border="1">
        <thead>
          <tr>
            <th>Check</th>
            <th>Phone</th>
            <th>Name</th>
            <th>Birthday</th>
            <th>Address</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td type="checkbox" id="check" name="result" ></td>
            <td name="phone" id="phone"></td>
            <td id="name"></td>
            <td id="birthday"></td>
            <td id="address"></td>
          </tr>
        <tbody>
      </table>
      <button class="btn"><i class="fa fa-trash"></i></button>
    </div>
    <div class="nextprevious">
      <a href="#" class="previous">&laquo; Previous</a>
      <a href="#" class="next">Next &raquo;</a>
  </div>
  </div>
</div>

<!-- <button type="button" name="button" onclick="Test()"> Click</button> -->
<script>

function Test() {
  var a = $('#comment_text').val();
  var invalidPhone = "";

 if(a.search(',') != '-1') {
   var s = a.split(',');
   s.forEach(function(element) {
     var isnum = /^\d+$/.test(element);
     var isphone = /((09|03|07|08|05)+([0-9]{8})\b)/g.test(element);
     if(isnum == true && isphone == true){
      $('#tableid').append('<tr>'
                                +'<td><input type="checkbox" ></td>'
                                + '<td>' + element + '</td>' + '</tr>');
    }else{
      invalidPhone += element+',';

    }
  });
  alert('Check again number Phone:'+invalidPhone);

 } else {
   var isnum = /^\d+$/.test(a);
   var isphone = /((09|03|07|08|05)+([0-9]{8})\b)/g.test(a);
    if(isnum == true && isphone == true) {
      $('#phone').text(a);
    }else {
      alert('Phone valid:' + a);
    }
 }
}

$('#formCompose').submit(function(event) {
      event.preventDefault();
      var form = $(this);
      console.log(form.serialize());
      $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize()
      });
    });

$(".toggle-input").click(function(){
  $(".input-phone").toggle(400);
});

$(".toggle-excel").click(function(){
  $(".input-excel").toggle(400);
});

$(".toggle-group").click(function(){
  $(".select-box").toggle(400);
});

</script>
@endsection
