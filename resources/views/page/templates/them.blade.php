@extends('master')
@section('content')
<div class="md-6" style="border:solid">
<form action="page/template/them" method="POST" >

  <div class="container">
      <h2>Add New Template</h2>
      <form action="addtemp" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
          <label for="fname">Service: </label>
          <input type="text" id="Service" name="Service" required><br>

          <label for="lname">Template: </label>
          <input type="textarea" id="Template" name="Template" required><br>

          <button class="btn btn-success" type="button" style="margin: 5px">
            <i class="fas fa-plus fa-sm"> Add User</i>
          </button> <br>
      </form>
  </div>

<table class="table table-bordered" id="dataTable" width="100%" >
  <thead>
    <tr>
      <th>Seq</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Action</th>
    </tr>
  </thead>
</table><br>

<button class="btn btn-success" type="button" style="margin: 10px" onclick="history.back();">
  <i class="fas fa-times fa-sm"> Cancel</i>
</button>
<button type="submit" class="btn btn-success fas fa-save fa-sm"  style="margin: 10px"> Save</button>

</form>
</div>

@endsection
