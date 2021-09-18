@extends('layouts.app')
@section('content')

<div class="row">
  <div class="col mt-4 ">
    <a href="/profile/{{$profile->id}}" class="btn btn-outline-secondary">Go to profile</a>
  </div>
</div>

<div class="my-2 bg-white border p-4">
 
<h3>Immunization Record Form</h3> 
<form method="POST" action="/vaccine/{{$profile->id}}">
@csrf
<div class="row">
  <div class="col-12 col-md-6">
    <label>Resident Name</label>
    <p  class="border p-2 rounded text-capitalize" name="resident_name">
      {{$profile->lastname}}, {{$profile->firstname}} {{$profile->middlename}}
    </p>
  </div>
  
  <div class="col-12 col-md-6">
    <label>Immunization Type</label>
    <div class="align-items-center">
    <input type="text" placeholder="Immunization type ex. polio vaccine" class="form-control mr-2 @error('immunization_type') is-invalid @enderror" name="immunization_type">
    @error('immunization_type')
    <div class="col-4 p-0 ml-1 text-danger">
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
    <input class="form-control @error('check_date') is-invalid @enderror" data-provide="datepicker" name="check_date" placeholder="date" type="date">
    @error('check_date')
    <div class="text-danger">
      <small>{{$message}}</small>
    </div>
    @enderror
  </div>
</div>

<div class="row">
    <div class="col-12">
        <label>Medical Concern</label>
        <textarea name="med_concern" placeholder="Medical Concern" id="" cols="30" rows="5" class="form-control"></textarea>
        @error('med_concern')
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