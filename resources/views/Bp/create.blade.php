@extends('layouts.app')
@section('content')

<div class="row">
  <div class="col mt-4 ">
    <a href="/profile/{{$profile->id}}" class="btn btn-outline-secondary">Back</a>
  </div>
</div>

<div class="my-2 bg-white border p-4">
 
<h3>Blood Pressure Record Form</h3> 
<form method="POST" method="/bp">
@csrf
<div class="row">
  <div class="col-12 col-md-6">
    <label>Resident Name</label>
    <p  class="border p-2 rounded text-capitalize" name="resident_name">
      {{$profile->lastname}}, {{$profile->firstname}} {{$profile->middlename}}
    </p>
  </div>
  <div class="col-12 col-md-6">
    <label>Blood Pressure</label>
    <div class="d-flex align-items-center">
    <input type="number" placeholder="Systolic Pressure Ex. 120 mmHg" value="{{ old('sp') }}" class="form-control col-4 mr-2 @error('sp') is-invalid @enderror" name="sp">
    
    <h2 class="px-2 m-0 text-secondary">/</h2>
    <input type="number" placeholder="Diastolic Pressure Ex. 80 mmHg" value="{{ old('dp') }}" class="form-control col-4 mx-2 @error('dp') is-invalid @enderror" name="dp">
    </div>
    
    <div class="d-flex">
    @error('sp')
    <div class="col-4 p-0 ml-1 text-danger">
      <small>{{$message}}</small>
    </div>
    @enderror
    <h2 class="px-2 m-0 text-secondary">&nbsp;</h2>
    @error('dp')
    <div class="col-4 mx-1 text-danger">
      <small>{{$message}}</small>
    </div>
    @enderror
    </div>

  </div>
</div>

<div class="row pt-3">
  <div class="col-6">
    <label>Age</label>
    <p class="border p-2 rounded">
      {{$profile->age}}
    </p>
  </div>
  
  <div class="col-6">
    <label>Date</label>
    <input class="form-control @error('check_date') is-invalid @enderror" value="{{ old('check_date') }}" data-provide="datepicker" name="check_date" placeholder="date" type="date">
    @error('check_date')
    <div class="text-danger">
      <small>{{$message}}</small>
    </div>
    @enderror
  </div>
</div>

<div class="row pt-3">
  <div class="col-12">
  <button class="btn btn-primary" type="submit">Save</button>
  <input class="btn mx-2 btn-outline-secondary" type="reset" value="Clear">
  </div>
</div>
</form>

</div>


@endsection