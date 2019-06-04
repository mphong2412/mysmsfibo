@extends('master')
@section('content')
<link href="source/css/style.css" rel="stylesheet">
<form action="{{route('compose')}}">
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
  @if(session()->has('success'))
  <script>
        alert({{ session()->get('success')}});
  </script>
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

    <textarea  placeholder="Input phone number" rows="20" name="mobile" id="comment_text" cols="40" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
    <button class="myButton" id="button1">Submit</button>

    <!--  -->
    <div class="input-container textForm">
      <input type="file" id="real-input">
        <button class="browse-btn" >
          Browse Files
        </button>
        <span class="file-info">Upload a file</span>
        <input class="myButton" type="submit" value="Submit" id="inputExcel">
    </div>

    <div class="select-box">
      <label for="select-box1" class="label select-box1"><span class="label-desc">Choose your country</span> </label>
      <input class="myButton" type="submit" value="Submit" id="inputGroup">
      <select id="select-box1" class="select">
        <option value="Choice 1">Falkland Islands</option>
        <option value="Choice 2">Germany</option>
        <option value="Choice 3">Neverland</option>
      </select>
    </div>

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
</form>

<button type="button" name="button" onclick="Test()"> Click</button>
<script>
$(document).ready(function() {

});

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
</script>
@endsection
