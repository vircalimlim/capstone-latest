@extends('layouts.app')
@section('content')

<div class="row">
  <div class="col mt-4 ">
    <a href="/profile/{{$profile->id}}" class="btn btn-outline-secondary">Go to profile</a>
  </div>
</div>


<div class="border text-secondary bg-white p-4 my-2">
 
 <form method="POST" action="/releasemed/{{$profile->id}}">
   @csrf
   
  <div class="row p-2 border-bottom">
    <h3 class="">Release Medicine</h3>
  </div>

  <div class="row py-2">
    <div class="col">
      <label>Resident Name</label>
      <div class="border rounded text-capitalized  p-2">{{$profile->lastname}}, {{$profile->firstname}} {{$profile->middlename}}</div>
    </div>
  </div>
  
  <div class="row py-2">
    <div class="col">
      <label>Date</label>
      <input type="date" class="form-control @error('date_released') is-invalid @enderror" name="date_released" value="{{ old('date_released') }}">
      @error('date_released')
      <div class="text-danger">
        <small>{{$message}}</small>
      </div>
      @enderror
    </div>
  </div>
  
  <div class="row py-2">
    <div class="col">
      <label>Medicine</label>
      <select name="medicine_id" class="form-control @error('medicine_id') is-invalid @enderror">
        <option selected disabled>Select Medicine</option>
        @foreach($medicines as $medicine)
        <option {{ old('medicine_id') == $medicine->id ? 'selected' : ''}} {{$medicine->quantity <= 0 ? 'disabled' : '' }} value="{{$medicine->id}}">{{$medicine->med_name}} ({{$medicine->quantity}} Stocks)</option>
        @endforeach
      </select>
      @error('medicine_id')
      <div class="text-danger">
        <small>{{$message}}</small>
      </div>
      @enderror
    </div>
  </div>
  
  <div class="row py-2">
    <div class="col">
      <label>Quantity</label>
      <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
    @error('quantity')
      <div class="text-danger">
      <small>{{$message}}</small>
      </div>
    @enderror
    
    @if(session()->has('quantityError'))
      <div class="text-danger">
      <small>{{session()->get('quantityError')}}</small>
      </div>
    @endif
    </div>
  </div>
  
  <div class="row py-2">
    <div class="col">
      <label>Medical concern</label>
      <textarea rows="5" class="form-control @error('concern') is-invalid @enderror" placeholder="Enter your medical concern" name="concern">{{ old('concern') }}</textarea>
      @error('concern')
      <div class="text-danger">
        <small>{{$message}}</small>
      </div>
      @enderror
    </div>
  </div>
  
  <div class="row text-right py-2">
    <div class="col">
      <input type="reset" value="Clear" class="mx-1 btn btn-outline-secondary">
      <input type="submit" class="mx-1 btn btn-primary" value="Save">
    </div>
  </div>
  
  </form>
  
</div>

@endsection