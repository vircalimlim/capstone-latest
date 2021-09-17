@extends('layouts.app')
@section('content')

<div class="border bg-white p-4 mt-4">
  <form method="POST" action="/medicine">
    @csrf
    
  <div class="row py-2">
    <h3 class="col">Add Medicine Information</h3>
  </div>
  
  <div class="row border-bottom py-2"></div>
  
  <div class="row pt-4 pb-2">
    
    <div class="col">
      <label>Medicine Name</label>
      <input type="text" class="form-control" name="med_name">
    </div>

    <div class="col">
      <label>Type</label>
      <input type="text" class="form-control" name="med_type">
    </div>
  </div>
  

  
  <div class="row py-2">
  <div class="col">
      <label>Quantity</label>
      <input type="number" class="form-control" name="quantity">
    </div>

    <div class="col">
      <label>Date Received</label>
      <input type="date" class="form-control" name="date_received">
    </div>
  </div>
  
  <div class="row py-4 justify-content-center">
    <div class="col-12 text-center">
      <button class="btn btn-outline-secondary mx-2" type="reset">Clear</button>
      <button class="btn btn-primary mx-2" type="submit">Save</button>
    </div>
  </div>
  </form>
</div>



@endsection