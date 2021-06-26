@extends('layouts.app')
@section('content')

<div class="border bg-white p-4 mt-4">
  
  <div class="row p-2 border-bottom">
    <h3 class="">Release Medicine</h3>
  </div>
  
  <div class="row py-2">
    <div class="col">
      <label>Resident Name</label>
      <input type="text" placeholder="Resident Name" class="form-control" name="res_name">
    </div>
  </div>
  
  <div class="row py-2">
    <div class="col">
      <label>Concern</label>
      <textarea rows="5" class="form-control" placeholder="Enter your medical concern" name="concern"></textarea>
    </div>
  </div>
  
</div>

@endsection