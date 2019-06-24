@extends('master')
@section('content')
<link href="source/css/style.css" rel="stylesheet">

<div class="container">
  <div class="title" style="width:100%; height: 10%; background-color: #FAFAFA;">
    <div class="" style="padding: 10px;font-size: 25px">
      <span class="" style="padding-left: 10%">Receiveds</span>
      <span class="" style="padding-left: 18%">Compose</span>
      <span class="" style="padding-left: 18%">Finish</span>
    </div>
  </div></br>
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
        @foreach($service as $sv)
        <option value="{{$sv->id}}">{{$sv->name}}</option>
        @endforeach
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
        @foreach($template as $tp)
        <option value="{{$tp->id}}">{{$tp->name}}</option>
        @endforeach
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
  <div class="row">
    <button type="submit" onclick="btnNext()" id="nextdecription">Next</button>
  </div>
  </form>
</div>

<script>
  function btnNext() {
    var service = $('#sendfrom').val();
    var campaign = $('#campaign').val();
    var template = $('#template').val();
    var content = $('#compose_content').val();
    if(service == "" || campaign == "" || template == "" || content == "") {
      alert('Vui lòng nhập đầy đủ các thông tin');
    }
  }

</script>
@endsection
