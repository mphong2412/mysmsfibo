@extends('master')
@section('content')
<form action="{{route('import')}}" method="post">
  <input type="file" name="inputfile">
  <button type="submit" name="inputfile">Submit</button>
</form>
@endsection
