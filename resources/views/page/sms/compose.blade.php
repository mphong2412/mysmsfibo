@extends('master')
@section('content')
<form action="{{route('compose')}}" method="post">
  @csrf
  @if(count($errors))
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
	@endif
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

    <textarea  placeholder="Input phone number" rows="20" name="mobile" id="mobile" cols="40" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
    <button class="myButton checkmobile">Submit</button>

    <!--  -->
    <div class="input-container textForm">
      <input type="file" id="real-input">
        <button class="browse-btn">
          Browse Files
        </button>
        <span class="file-info">Upload a file</span>
        <input class="myButton" type="submit" value="Submit">
    </div>

    <div class="select-box">
      <label for="select-box1" class="label select-box1"><span class="label-desc">Choose your country</span> </label>
      <input class="myButton" type="submit" value="Submit">
      <select id="select-box1" class="select">
        <option value="Choice 1">Falkland Islands</option>
        <option value="Choice 2">Germany</option>
        <option value="Choice 3">Neverland</option>
      </select>
    </div>

    <div class="table-wrapper">
      <table class="fl-table" name="listcontact" border="1">
        <thead>
          <tr>
            <th>Check</th>
            <th>Phone</th>
            <th>Name</th>
            <th>Birthday</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody required>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
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
</form>
<script type="text/javascript">
$(document).ready(function() {
    $('body').on('click','.checkmobile', function() {
    var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    var mobile = $('#mobile').val();
    if(mobile !==''){
        if (vnf_regex.test(mobile) == false)
        {
            alert('Số điện thoại của bạn không đúng định dạng!');
        }else{
            alert('Số điện thoại của bạn hợp lệ!');
        }
    }else{
        alert('Bạn chưa điền số điện thoại!');
    }
    });
});
</script>
@endsection()
