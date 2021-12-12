@extends('layouts.app')
@section('content')

<div class="row">
  <div class="col mt-4 ">
    <a href="/medicine" class="btn btn-outline-secondary">Back</a>
  </div>
</div>

<div class="border bg-white p-4 mt-2">
  <form method="POST" action="/medicine">
    @csrf
    
  <div class="row py-2">
    <h3 class="col">Add Medicine Information</h3>
  </div>
  
  <div class="row border-bottom py-2"></div>
  
  <div class="row pt-4 pb-2">
    
    <div class="col">
      <label>Medicine Name</label>
      <input type="text" class="form-control @error('med_name') is-invalid @enderror" name="med_name" value="{{ old('med_name') }}">
        @error('med_name')
        <div class="text-danger">
          <small>{{$message}}</small>
        </div>
        @enderror
    </div>

    <div class="col">
      <label>Type</label>
      <input type="text" class="form-control @error('med_type') is-invalid @enderror" name="med_type" value="{{ old('med_type') }}">
      @error('med_type')
        <div class="text-danger">
          <small>{{$message}}</small>
        </div>
        @enderror
    </div>
  </div>
  

  
  <div class="row py-2">
  <div class="col">
      <label>Quantity</label>
      <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}">
      @error('quantity')
        <div class="text-danger">
          <small>{{$message}}</small>
        </div>
        @enderror
    </div>

    <div class="col">
      <label>Date Received</label>
      <input type="date" class="form-control @error('date_received') is-invalid @enderror" name="date_received" value="{{ old('date_received') }}">
      @error('date_received')
        <div class="text-danger">
          <small>{{$message}}</small>
        </div>
        @enderror
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