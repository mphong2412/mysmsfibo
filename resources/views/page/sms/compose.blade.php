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

    @if(!empty($phonefalse))
        <div class="alert alert-danger">
          <strong>Whoops!</strong> Số điện thoại không hợp lệ...
          <br/>
          <ul>
            @foreach($phonefalse as $phone)
              {{$phone}}<button type="button" class="close" data-dismiss="alert">&times;</button>
            @endforeach
          </ul>
        </div>
    @endif


    <form action="" autocomplete="off" id="formCompose">
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

  <form action="{{route('compose.group')}}" id="formCompose">
    <div class="toggle-group">Input From Group</div>
    <div class="select-box">
      <label for="select-box1" class="label select-box1"><span class="label-desc">Group danh sách liên lạc</span> </label>
      <button class="myButton" type="submit"  id="inputGroup">Submit</button>
      <select id="select-box1" name="groupcontact" class="select">
        @foreach($group as $gr)
        <option value="{{$gr->id}}">{{$gr->name}}</option>
        @endforeach
      </select>
    </div>
  </form>

    <div class="table-wrapper">
      <table id="customers">
        <tr>
          <th>Check</th>
          <th>Phone</th>
          <th>Name</th>
          <th>Birthday</th>
          <th>Address</th>
        </tr>
        @if(!empty($phonetrue))
        @foreach($phonetrue as $true)
        <tr>
          <td type="checkbox" id="check" name="result"></td>
          <td name="phone" class="phone" id="phone">{{$true}}</td>
          <td id="name"></td>
          <td id="birthday"></td>
          <td id="address"></td>
        </tr>
        @endforeach
        @endif

        @if(!empty($phonegroup))
        @foreach($phonegroup as $true)
        <tr>
          <td type="checkbox" id="check" name="result" ></td>
          <td name="phone" class="phone" id="phone">{{$true->phone}}</td>
          <td id="name">{{$true->name}}</td>
          <td id="birthday">{{$true->birthday}}</td>
          <td id="address">{{$true->address}}</td>
        </tr>
        @endforeach
        @endif
      </table>
      <button class="btn"><i class="fa fa-trash"></i></button>
    </div>
    <div class="nextprevious">
      <button  id="nextdecription" onclick="Test()"  class="next">Next &raquo;</button>
    </div>
  </div>


  <div class="container">
    <form action="">
    <div class="row">
      <div class="col-25">
        <label for="fname">Khách hàng:</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" value="{{Auth::user()->username}}" disabled>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="country">Gửi từ</label>
      </div>
      <div class="col-35">
        <select id="sendfrom" name="sendfrom">
          <option value=""></option>
          @if(!empty($service))
          @foreach($service as $sv)
          <option value="{{$sv->name}}">{{$sv->name}}</option>
          @endforeach
          @endif
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="lname">Tên chiến dịch</label>
      </div>
      <div class="col-75">
        <input type="text" id="campaign" name="campaign" placeholder="Your last name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Nội dung mẫu</label>
      </div>
      <div class="col-35">
        <select id="template" name="template">
          <option value=""></option>
          @if(!empty($template))
          @foreach($template as $tp)
          <option value="{{$tp->name}}">{{$tp->name}}</option>
          @endforeach
          @endif
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Nội dung sms</label>
      </div>
      <div class="content-sms">
        <button class="myButton" type="submit" >Tên</button>
        <button class="myButton" type="submit" >Ngày</button>
        <button class="myButton" type="submit" >Email</button>
        <button class="myButton" type="submit" >Sđt</button>
      </div>

      <div class="col-75" style="margin-left: 25%">
        <p>Lưu ý: Nội dung tin nhắn phải có nghĩa, không có dấu, tuyệt đối không có chữ 'test' hoặc 'kiểm tra'</p>
        <textarea id="compose_content" name="content" style="height:200px"></textarea>
        <p>***Lưu ý: Khi thay thế các chuỗi {sodienthoai}, {ngay},...vv bằng dữ liệu thích hợp, Độ dài tin nhắn sẽ thay đổi. </p>
      </div>
    </div>
    </form>
    <div class="nextprevious">
      <button id="previous" class="previous">&laquo; Previous</button>
      <button  id="nextdecription" onclick="btnNext()" class="next">Next &raquo;</button>
    </div>
  </div>

  <div>
    <div class="container">
      <form action="">
      <div class="row">
        <div class="col-25">
          <label for="member">Khách hàng:</label>
        </div>
        <div class="col-75">
          <input type="text" id="member" name="member" value="{{Auth::user()->username}}" disabled>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="servicename">Gửi Từ:</label>
        </div>
        <div class="col-75">
          <input type="text" id="servicename" name="servicename" value="" disabled>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="campaign">Tên Chiến Dịch:</label>
        </div>
        <div class="col-75">
          <input type="text" id="campaignreview" name="campaignreview" disabled>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="contentsms">Nội Dung SMS:</label>
        </div>
        <div class="col-75">
          <input type="text" id="contentsms" name="contentsms" value="" disabled>
        </div>
      </div>

      <table id="customers" class="savefunction">
        <tr>
          <th>Sđt</th>
          <th>Nội Dung</th>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
      </table>
    </div>
    <div class="nextprevious">
      <button id="previous" class="previous">&laquo; Previous</button>
    </div>
  </div>
</div>
<script>

// function Test() {
//   var a = $('#comment_text').val();
//   var invalidPhone = "";
//
//  if(a.search(',') != '-1') {
//    var s = a.split(',');
//    s.forEach(function(element) {
//      var isnum = /^\d+$/.test(element);
//      var isphone = /((09|03|07|08|05)+([0-9]{8})\b)/g.test(element);
//      if(isnum == true && isphone == true){
//       $('#tableid').append('<tr>'
//                                 +'<td><input type="checkbox" ></td>'
//                                 + '<td>' + element + '</td>' + '</tr>');
//     }else{
//       invalidPhone += element+',';
//
//     }
//   });
//   alert('Check again number Phone:'+invalidPhone);
//
//  } else {
//      var isnum = /^\d+$/.test(a);
//    var isphone = /((09|03|07|08|05)+([0-9]{8})\b)/g.test(a);
//     if(isnum == true && isphone == true) {
//       $('#phone').text(a);
//     }else {
//       alert('Phone valid:' + a);
//     }
//  }
// }


function Test() {
  var a = $('#comment_text').val();
  var invalidPhone = "";
  if(a == ""){
    alert('Bạn chưa nhập số điện thoại!');
  } else {
  if(a.search(',') != '-1') {
   var s = a.split(',');
   s.forEach(function(element) {
     var isnum = /^\d+$/.test(element);
     var isphone = /((09|03|07|08|05)+([0-9]{8})\b)/g.test(element);
     if(isnum == true && isphone == true){
      $('#customers').append('<tr>'
                                +'<td><input type="checkbox" ></td>'
                                + '<td>' + element + '</td>'
                                +'<td></td>'
                                +'<td></td>'
                                +'<td></td>' + '</tr>');
    } else{
      invalidPhone += element+',';
    }
  });
  if (invalidPhone.length > 0){
    alert('Check again number Phone:'+invalidPhone);
  } else {
    console.log('1111');
  }
 } else {
   var isnum = /^\d+$/.test(a);
   var isphone = /((09|03|07|08|05)+([0-9]{8})\b)/g.test(a);
    if(isnum == true && isphone == true) {
      $('#customers').append('<tr>'
                                +'<td><input type="checkbox" ></td>'
                                + '<td>' + a + '</td>' + '</tr>');
    }else {
      alert('Phone valid:' + a);
    }
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

$("#nextdecription").ready(function(){
  if($("#phone").length){
    $("#nextdecription").prop("disabled", false);
  } else {
    $("#nextdecription").prop("disabled", true);
  }
});

function btnNext() {
  var service = $('#sendfrom').val();
  var campaign = $('#campaign').val();
  var template = $('#template').val();
  var content = $('#compose_content').val();
  if(service == "" || campaign == "" || template == "" || content == "") {
    alert('Vui lòng nhập đầy đủ các thông tin');
  } else {
    var setcampaign = $('#campaign').val();
    var setcontent = $('#compose_content').val();
    var setservice = $('#sendfrom').val();
    $("#campaignreview").val(setcampaign).change();
    $("#contentsms").val(setcontent).change();
    $("#servicename").val(setservice).change();
    $('#customers .phone').each(function() {
      var numberphone = ($(this).html());
      $('.savefunction').append('<tr>'
                                + '<td>' + numberphone + '</td>'
                                + '<td>' + setcontent + '</td>' + '</tr>');

    });
  }
}

$( "select" ) .change(function () {
  var settemplate = $('#template').val();
  $("#compose_content").val(settemplate).change();
});

$(".sdfsdf").click(function () {
  var id = $(this).closest("tr").find("#phone").text();
  alert(id);
});

</script>
@endsection
