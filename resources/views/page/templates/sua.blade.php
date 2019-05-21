@extends('master')
@section('content')
<div class="md-6" style="border:solid">
<form action="" method="POST" >
  <div class="container">
      <h2>Edit Template</h2>
      <form action="" method="POST">
          <label for="fname">Service: </label>
          <input type="text" id="Service" name="Service" value="" required><br>

          <label for="lname">Template: </label>
          <input type="textarea" id="Template" name="Template" value="" required><br>

          <button class="btn btn-success" type="button" style="margin: 5px">
            <i class="fas fa-plus fa-sm"> Add User</i>
          </button> <br>
      </form>
  </div>
<table class="table table-bordered" id="dataTable" width="100%" >
  <thead>
    <tr>
      <th>Seq</th>
      <th>Services</th>
      <th>Template</th>
      <th>Actions</th>
    </tr>
  </thead>
</table><br>
<button class="btn btn-success" type="button" style="margin: 10px" onclick="history.back();">
  <i class="fas fa-times fa-sm"> Cancel</i>
</button>
<button class="btn btn-success" type="button" style="margin: 10px" onclick="">
  <i class="fas fa-save fa-sm"> Save</i>
</button>
</form>
</div>
@endsection
