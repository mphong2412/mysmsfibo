@extends('master')
@section('content')
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500|Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link href="source/css/style.css" rel="stylesheet">

<form method="post" action="{{route('test')}}">
<div class="bs-example">
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">1. What is HTML?</button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <textarea  placeholder="Input phone number" rows="20" name="mobile" id="comment_text" cols="40" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea><br>
                  <button class="myButton" id="inputPhone">Submit</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">2. What is Bootstrap?</button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <div "example-import">
                    <input type="file" class="file" name="zip_file_import" />
                    <button type="submit" class="myButton" id="inputExcel">Submit</button>
                    <a class="example-import" href="/source/data">Sample Template</a>
                  </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree">3. What is CSS?</button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="select-box">
                    <label for="select-box1" class="label select-box1"><span class="label-desc">Choose your country</span> </label>
                    <button class="myButton" type="submit"  id="inputGroup">Submit</button>
                    <select id="select-box1" class="select">
                      <option value="Choice 1">Falkland Islands</option>
                      <option value="Choice 2">Germany</option>
                      <option value="Choice 3">Neverland</option>
                    </select>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
