@extends('layouts.app')
@section('content')

<div class="row px-2 py-md-5 justify-content-center">
<div class="col-12 col-md-10 shadow-lg bg-white p-4 rounded text-dark">
  
    <form class="d-inline" method="POST" action="/profile/{{$profile->id}}">
      @csrf
      @method('PATCH')
  
  <div class="info-wrapper text-secondary d-nozssne">
  
  <div class="row pb-3">
    <div class="col text-center ">
      <h3 class="font-weight-light">Personal Information</h3>
    </div>
  </div>
  
  <div class="row align-items-center pb-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>House Number</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <input type="text" class="form-control" name="houseNum" value="{{ $profile->houseNum }}" autofocus="true" />
    </div>
  </div>
  
  <div class="row align-items-center pb-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>First Name</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <input type="text" class="form-control" name="firstname" value="{{ $profile->firstname }}" />
    </div>
  </div>

  <div class="row align-items-center pb-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Middle Name</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <input type="text" name="middlename" class="form-control" value="{{ $profile->middlename }}" />
    </div>
  </div>

  <div class="row align-items-center pb-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Last Name</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <input type="text" name="lastname" class="form-control" value="{{ $profile->lastname }}" />
    </div>
  </div>


  <div class="row align-items-center">
    <div class="col-3 col-sm-3 col-md-3 pb-4">
      <label><strong>Age</strong></label>
    </div>
    <div class="col-9 col-sm-3 col-md-3 pb-4">
      <input type="text" name="age" class="form-control" value="16" />
    </div>

    <div class="col-3 col-sm-3 col-md-3 pb-4">
      <label><strong>Gender</strong></label>
    </div>
    <div class="col-9 col-sm-3 col-md-3 pb-4">
      <input type="text" name="gender" class="form-control" value="Male" />
    </div>
  </div>

  
  @if($profile->work)
  
  <div class="row align-items-center pb-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Work/Profession</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <input type="text" name="profession" class="form-control" value="{{ $profile->work->profession }}" />
    </div>
  </div>
  
  <div class="row align-items-center pb-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Workplace</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <input type="text" name="workplace" class="form-control" value="{{ $profile->work->workplace }}" />
    </div>
  </div>
  
  @elseif($profile->student)
  
  <div class="row align-items-center pb-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>School</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <input type="text" name="school" class="form-control" value="{{ $profile->student->school }}" />
    </div>
  </div>
  
  <div class="row align-items-center pb-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Educational Level</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <input type="text" name="educ_level" class="form-control" value="{{ $profile->student->educ_level }}" />
    </div>
  </div>
  
  <div class="row align-items-center pb-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Grade/Year Level</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <input type="text" name="year_level" class="form-control" value="{{ $profile->student->year_level }}" />
    </div>
  </div>
  
  @endif
  
  <div class="text-right">
    <div class="d-inline p-2">
      <a href="/profile/{{$profile->id}}" role="button" class="btn btn-outline-secondary font-weight-bold py-2 px-4">Back</a>
    </div>

    <div class="d-inline py-2">
      <button class="btn btn-success font-weight-bold py-2 px-4">Save</button>
    </div>
    
  </div>
  
  </div>
  </form>
  </div>
  </div>

@endsection