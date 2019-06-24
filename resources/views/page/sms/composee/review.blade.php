@extends('master')
@section('content')
<link href="source/css/style.css" rel="stylesheet">
<h3>Review</h3>

<div class="container">
  <div class="title" style="width:100%; height: 10%; background-color: #FAFAFA;">
    <div class="" style="padding: 10px;font-size: 25px">
      <span class="" style="padding-left: 10%">Receiveds</span>
      <span class="" style="padding-left: 18%">Compose</span>
      <span class="" style="padding-left: 18%">Finish</span>
    </div>
  </div></br>

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
      <label for="fname">Gửi Từ:</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" value="" disabled>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="fname">Tên Chiến Dịch:</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" value="" disabled>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="fname">Nội Dung SMS:</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="firstname" value="" disabled>
    </div>
  </div>

</div>

@endsection
