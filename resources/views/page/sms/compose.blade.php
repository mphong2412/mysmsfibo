@extends('layouts.base')
@section('content')
<div class="formCompose">

  <div class="card">
      <h4 class="card-header">Compose</h4>
      <div class="card-body">



<div class="container">
  <!-- <div class="" style="width: 90%; height: 80%; margin-left: 5%;"> -->
    <div class="" style="width:100%; height: 10%; background-color: #FAFAFA;">
      <div class="" style="padding: 10px;font-size: 25px">
        <span class="" style="padding-left: 10%">Receiveds</span>
        <span class="" style="padding-left: 18%">Compose</span>
        <span class="" style="padding-left: 18%">Finish</span>
      </div>
    </div><br>

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

    <!--  -->


  <!--Accordion wrapper-->
  <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
    <!-- Accordion card -->
    <div class="card">
      <!-- Card header -->
      <div class="card-header" role="tab" id="headingTwo1">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
          aria-expanded="false" aria-controls="collapseTwo1">
          <h5 class="mb-0">
            Nhập Số Điện Thoại <i class="fas fa-angle-down rotate-icon"></i>
          </h5>
        </a>
      </div>

      <!-- Card body -->
      <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1"
        data-parent="#accordionEx1">
        <div class="card-body">

          <textarea  placeholder="Input phone number" rows="5" name="mobile" id="comment_text" cols="40" class="form-control-file" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea><br>
          <p style="color: red">SĐT cách nhau bởi dấu "," và đấu số điện thoại "09|03|07|08|05" ví dụ: 0901861911 | 0371861912,0901861913 ..v.v.</p>
          <button class="btn btn-primary"  onclick="Test()" type="submit" > Submit </button>
        </div>

      </div>

    </div>
    <!-- Accordion card -->
    <!-- Accordion card -->
    <div class="card">
      <!-- Card header -->
      <div class="card-header" role="tab" id="headingTwo2">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo21"
          aria-expanded="false" aria-controls="collapseTwo21">
          <h5 class="mb-0">
            Nhập Từ File Excel <i class="fas fa-angle-down rotate-icon"></i>
          </h5>
        </a>
      </div>
      <!-- Card body -->
      <div id="collapseTwo21" class="collapse" role="tabpanel" aria-labelledby="headingTwo21"
        data-parent="#accordionEx1">
        <div class="card-body">
          <form action="{{route('compose.import')}}" method="post" id="formCompose" enctype="multipart/form-data">
            @csrf
            <p style="color: red">Chọn file Excel</p>
            <input type="file" class="file" id="inputfile" name="inputfile">
            <a class="example-import" href="/source/data.xlsx">Sample Template</a>
            <div class="mt-3">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Accordion card -->

    <!-- Accordion card -->
    <div class="card">
      <!-- Card header -->
      <div class="card-header" role="tab" id="headingThree31">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree31"
          aria-expanded="false" aria-controls="collapseThree31">
          <h5 class="mb-0">
            Nhập Từ Nhóm <i class="fas fa-angle-down rotate-icon"></i>
          </h5>
        </a>
      </div>
      <!-- Card body -->
      <div id="collapseThree31" class="collapse" role="tabpanel" aria-labelledby="headingThree31"
        data-parent="#accordionEx1">
        <div class="card-body">
          <form action="" id="formCompose">
            <div class="toggle-group"><h4 style="color: red">Nhập Từ Nhóm</h4></div>
            <div class="select-box">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Group danh sách liên lạc</label>
                <select class="form-control" name="groupcontact" id="exampleFormControlSelect1" style="width: 30%">
                  @if(!empty($group))
                  @foreach($group as $gr)
                  <option value="{{$gr->id}}">{{$gr->name}}</option>
                  @endforeach
                  @endif
                </select><br>
                <input class="btn btn-primary"  type="submit" value="Submit">
              </div>
            </div>
          </form><br>
        </div>
      </div>
    </div><br>
    <!-- Accordion card -->
    <div class="table table-hover">
      <table id="customers" style="border: 1" class="table table-hover">
        <tr style="color: #007bff">
          <th scope="row">Chọn</th>
          <th scope="row">Thao tác</th>
          <th scope="row">Phone</th>
          <th scope="row">Name</th>
          <th scope="row">Birthday</th>
          <th scope="row">Address</th>
        </tr>
        @if(!empty($phonetrue))
        @foreach($phonetrue as $true)
        <tr id="phonetrue">
          <td><input type="checkbox" class="chcktbl" id="check" name="select[]" ></td>
          <td><button id="delete-record" class="btn"><i class="fa fa-trash"></i></button></td>
          <td name="phone" class="phone" id="phone">{{$true}}</td>
          <td id="name"></td>
          <td id="birthday"></td>
          <td id="address"></td>
        </tr>
        @endforeach
        @endif

        @if(!empty($phonegroup))
        @foreach($phonegroup as $true)
        <tr id="phonegroup">
          <td><input type="checkbox" class="chcktbl" id="check" name="select[]" ></td>
          <td><button id="delete-record" class="btn"><i class="fa fa-trash"></i></button></td>
          <td name="phone" class="phone" id="phone">{{$true->phone}}</td>
          <td id="name">{{$true->name}}</td>
          <td id="birthday">{{$true->birthday}}</td>
          <td id="address">{{$true->address}}</td>
        </tr>
        @endforeach
        @endif
      </table>
      <br/>
      <button type="button" id="btn1" class="btn btn-primary">Chọn hết</button>
      <button type="button" id="btn2" class="btn btn-danger">Bỏ chọn</button>
      <button type="button" id="delete-all" class="btn btn-danger fa fa-trash"></button>
    </div>
    <div class="nextprevious">
      <button type="button" id="nextdecription" class="btn btn-success">Next &raquo;</button>
    </div>
  </div>
  </div>

  <!-- Accordion wrapper -->

  <div class="container">
    <form action="">

      <div class="form-group row">
        <label for="inputuserlogin" class="col-sm-2 col-form-label">Khách Hàng:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="userlogin" value="{{Auth::user()->username}}" disabled>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputuserlogin" class="col-sm-2 col-form-label">Gửi Từ:</label>
        <div class="col-sm-10">
          <select class="form-control" id="sendfrom" name="sendfrom">
            <option>Chọn data extra</option>
            @if(!empty($service))
            @foreach($service as $sv)
            <option value="{{$sv->name}}">{{$sv->name}}</option>
            @endforeach
            @endif
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="campaign" class="col-sm-2 col-form-label">Tên Chiến Dịch:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="campaign" name="campaign">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputuserlogin" class="col-sm-2 col-form-label">Nội Dung Mẫu:</label>
        <div class="col-sm-10">
          <select class="form-control" id="template" name="template">
            <option>Chọn data extra</option>
            @if(!empty($template))
            @foreach($template as $tp)
            <option value="{{$tp->name}}">{{$tp->name}}</option>
            @endforeach
            @endif
          </select>
        </div>
      </div>

      <div class="form-group row">
        <label for="inputuserlogin" class="col-sm-2 col-form-label">Nội Dung Sms:</label>
        <div class="content-sms" style="margin-left:15px">
          <button class="btn btn-info" type="submit" >Tên</button>
          <button class="btn btn-info" type="submit" >Ngày</button>
          <button class="btn btn-info" type="submit" >Email</button>
          <button class="btn btn-info" type="submit" >Sđt</button>
        </div>
        <div class="col-sm-10" style="margin-left:16.8%">
          <p>Lưu ý: Nội dung tin nhắn phải có nghĩa, không có dấu, tuyệt đối không có chữ 'test' hoặc 'kiểm tra'</p>
          <textarea id="compose_content" class="form-control" name="content" style="height:200px"></textarea>
          <p>***Lưu ý: Khi thay thế các chuỗi {sodienthoai}, {ngay},...vv bằng dữ liệu thích hợp, Độ dài tin nhắn sẽ thay đổi. </p>
        </div>
      </div>



      <div class="nextprevious">
        <button id="previous" class="btn btn-secondary" >&laquo; Previous</button>
        <button type="button" id="nextdecription" onclick="btnNext()"  class="btn btn-success">Next &raquo;</button>
      </div>
    </div>
  </div>

    <div class="container">
      <form action="" method="post">

        <div class="mid" style="text-align: center; margin-bottom: 20px">
          <button class="btn btn-outline-success" type="button" value="1">Lưu</button>
          <button class="btn btn-outline-warning" type="button" value="2"/>Gửi</button>
        </div>
        <div class="form-group row">
          <label for="inputuserlogin" class="col-sm-2 col-form-label">Khách Hàng:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="userlogin" value="{{Auth::user()->username}}" disabled>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputuserlogin" class="col-sm-2 col-form-label">Gửi Từ:</label>
          <div class="col-sm-10">
            <input type="text"class="form-control" id="servicename" name="servicename" disabled>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputuserlogin" class="col-sm-2 col-form-label">Tên Chiến Dịch:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="campaignreview" disabled>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputuserlogin" class="col-sm-2 col-form-label">Nội Dung SMS:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="contentsms" name="contentsms" value="" disabled>
          </div>
        </div>

        <table id="savefunction" class="table">
          <tr>
            <th>Sđt</th>
            <th>Nội Dung</th>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </table>
    </form>

    <div class="previous">
      <button id="btnPrevious" class="btn btn-secondary" >&laquo; Previous</button>
      <button  class="btn btn-secondary" onclick="checkexists()" >&laquo; Check</button>
      <button  class="btn btn-secondary" onclick="testduplicate()" >&laquo; Checkdupblicate</button>
    </div>
  </div>
</div>
</div>
</div>
<script src="{{ asset('js/composeSMS/compose.js') }}"> </script>
@endsection
