@extends('layouts.app')
@section('content')

    <div class="px-3 pdy-5">

<div class="row mt-md-5 py-2 justify-content-around">
<div class="py-4 px-4 text-secondary rounded shadow-lg bg-white font-weight-light col-12 col-md-8 col-lg-7">
  
<h3 class="text-center">Immunization</h3>

<form method="POST" action="/profile">
  <input type="hidden" name="_token">
  @csrf
  
<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>First Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input placeholder="First Name" class="form-control" type="text" name="firstname" autocomplete="firstname"/>
  </div>
  
</div>

<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Last Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input placeholder="Last Name" class="form-control" type="text" name="lastname" autocomplete="lastname"/>
  </div>
  
</div>

<div class="row my-4">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>First Name</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  <input placeholder="First Name" class="form-control" type="text" name="firstname" autocomplete="firstname"/>
  </div>
  
</div>

<div class="row my-4 ">
  
  <div class="col-12 col-sm-12 col-md-3 font-weight-bold">
    <label>Gender</label>
  </div>
  
  <div class="col-12 col-sm-12 col-md-9">
  
      <div class="custom-control custom-radio mr-sm-2">
        <input type="radio" name="gender" value="Male" class="custom-control-input" id="male">
        <label class="custom-control-label" for="male">Male</label>
      </div>
      
      <div class="custom-control custom-radio mr-sm-2">
        <input type="radio" name="gender" value="Female" class="custom-control-input" id="female">
        <label class="custom-control-label" for="female">Female</label>
      </div>
    
  </div>
  
</div>
  

</form>

</div>
</div>

    </div>

@endsection