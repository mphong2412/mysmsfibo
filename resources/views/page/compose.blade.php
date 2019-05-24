@extends('master')
@section('content')
<form action="{{route('compose')}} method="post"">
<div class="">
  <div style="background-color: white; padding-bottom: 0px">
    <ul class="">
      <li>
        <span class="">Compose</span>
      </li>
    </ul>
  </div>
</div>

<div style="width: 90%; height: 90%; margin-left: 5%; background-color: white; margin-bottom: 20px;">
  <div class="" style="width: 90%; height: 80%; margin-left: 5%;">
    <div class="" style="width:100%; height: 10%; background-color: #FAFAFA;">
      <div class="" style="padding: 10px;font-size: 25px">
        <span class="" style="padding-left: 10%">Receiveds</span>
        <span class="" style="padding-left: 18%">Compose</span>
        <span class="" style="padding-left: 18%">Finish</span>
      </div>
    </div></br>
    <div class="" style="width: 100%; height: 100%">
      <h5>Input Phone Number
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
          <label class="form-check-label" for="inlineRadio1">Allow Duplicate</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
          <label class="form-check-label" for="inlineRadio2">Not Allow Duplicate</label>
        </div>
      </h5>
      <label>Input Phone Number</label><br>
      <textarea type="text" name="phonenumber" placeholder="Input phone number" value="" style="width: 70%"></textarea><br>
      <button> Submit</button>
      <br>
      <button >Import form excel</button>
      <label>Import form group</label><select><option></option></select>
      </div>
    </div>


    </div>
</div>
</form>
@endsection()
