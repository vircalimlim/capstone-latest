@extends('layouts.app')
@section('content')

<div class="row">
  <div class="col mt-4 ">
    <a href="/profile/{{$profile->id}}" class="btn btn-outline-secondary">Back</a>
  </div>
</div>

<div class="my-2 bg-white border p-4">
 
<h3>Prenatal Record Form</h3> 
<form method="POST" action="/prenatal/{{$profile->id}}">
@csrf
<div class="row">
  <div class="col-12 col-md-6">
    <label>Resident Name</label>
    <p  class="border p-2 rounded text-capitalize" name="resident_name">
      {{$profile->lastname}}, {{$profile->firstname}} {{$profile->middlename}}
    </p>
  </div>
  
  <div class="col-12 col-md-6">
    <label>Last Menstrual Period</label>
    <input class="form-control @error('lmp') is-invalid @enderror" value="{{ old('lmp') }}" data-provide="datepicker" name="lmp" placeholder="date" type="date">
    @error('lmp')
    <div class="text-danger">
      <small>{{$message}}</small>
    </div>
    @enderror
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
    <label>Checkup date</label>
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