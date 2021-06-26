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
      <label>Medicine Id Number</label>
      <input type="text" class="form-control" name="med_id_num">
    </div>
    <div class="col">
      <label>Medicine Name</label>
      <input type="text" class="form-control" name="med_name">
    </div>
  </div>
  
  <div class="row py-2">
    <div class="col">
      <label>Type</label>
      <input type="text" class="form-control" name="med_type">
    </div>
    <div class="col">
      <label>Description</label>
      <input type="text" class="form-control" name="description">
    </div>
  </div>

  <div class="row py-2">
    <div class="col">
      <label>Supplier Name</label>
      <input type="text" class="form-control" name="supplier_name">
    </div>
    <div class="col">
      <label>Quantity</label>
      <input type="number" class="form-control" name="quantity">
    </div>
  </div>
  
  <div class="row py-2">
    <div class="col">
      <label>Date Received</label>
      <input type="date" class="form-control" name="date_received">
    </div>
    <div class="col">
      <label>Expiry Date</label>
      <input type="date" class="form-control" name="expiry_date">
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

<div class="border mt-4 p-4 bg-white">
  
  <div class="row border-bottom">
    <h3 class="p-2">Medicine Records</h3>
  </div>
  <div class="row">
    <div class="col">
      <table class="table">
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>TYPE</th>
          <th>DESCRIPTION</th>
          <th>STOCKS</th>
          
        @foreach($medicines as $medicine)
        </tr>
          <td>{{ $medicine->med_id_num }}</td>
          <td>{{ $medicine->med_name }}</td>
          <td>{{ $medicine->med_type }}</td>
          <td>{{ $medicine->description }}</td>
          <td>{{ $medicine->quantity }}</td>
        <tr>
        @endforeach
          
        </tr>
      </table>
    </div>
  </div>
</div>

@endsection