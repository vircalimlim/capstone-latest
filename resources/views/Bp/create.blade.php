@extends('layouts.app')
@section('content')
<div class="my-4 bg-white border p-4">
 
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
    <input type="number" placeholder="Systolic Pressure Ex. 120 mmHg" class="form-control col-4 mr-2" name="sp">
    <h2 class="px-2 m-0 text-secondary">/</h2>
    <input type="number" placeholder="Diastolic Pressure Ex. 80 mmHg" class="form-control col-4 mx-2" name="dp">
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
    <input class="form-control" data-provide="datepicker" name="check_date" placeholder="date" type="date">
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