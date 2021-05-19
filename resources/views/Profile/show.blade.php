@extends('layouts.app')
@section('content')

<!-- <h3>{{$profile->lastname}}</h3> -->
@if( !$student && !$work)
<!-- if($work || $student) -->

<show-profile profileid="{{$profile->id}}"></show-profile>

@else
<info-profile>
  <div class="info-wrapper d-none">
    
  <div class="row pb-3">
    <div class="col text-center ">
      <h3>Personal Information</h3>
    </div>
  </div>
  
  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>House Number</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border px-3 py-2  rounded">
        {{ $profile->houseNum }}
      </p>
    </div>
  </div>
  
  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>First Name</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border px-3 py-2  rounded">
        {{ $profile->firstname }}
      </p>
    </div>
  </div>

  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Middle Name</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border px-3 py-2  rounded">
        {{ $profile->middlename }}
      </p>
    </div>
  </div>

  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Last Name</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border px-3 py-2  rounded">
        {{ $profile->lastname }}
      </p>
    </div>
  </div>


  <div class="row align-items-center pb-3">
    <div class="col-3 col-sm-3 col-md-3">
      <label><strong>Age</strong></label>
    </div>
    <div class="col-9 col-sm-3 col-md-3">
      <p class="border px-3 py-2  rounded">
        16
      </p>
    </div>

    <div class="col-3 col-sm-3 col-md-3">
      <label><strong>Gender</strong></label>
    </div>
    <div class="col-9 col-sm-3 col-md-3">
      <p class="border px-3 py-2  rounded">
        Male
      </p>
    </div>
  </div>

  
  @if($profile->work)
  
  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Work/Profession</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border px-3 py-2  rounded">
        {{ $profile->work->profession }}
      </p>
    </div>
  </div>
  
  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Workplace</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border px-3 py-2  rounded">
        {{ $profile->work->workplace }}
      </p>
    </div>
  </div>
  
  @elseif($profile->student)
  
  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>School</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border px-3 py-2  rounded">
        {{ $profile->student->school }}
      </p>
    </div>
  </div>
  
  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Educational Level</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border px-3 py-2  rounded">
        {{ $profile->student->educ_level }}
      </p>
    </div>
  </div>
  
  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Grade/Year Level</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border px-3 py-2  rounded">
        {{ $profile->student->year_level }}
      </p>
    </div>
  </div>
  
  @endif
  
  <div class="row">
    <div class="col text-right">
      <button class="btn btn-outline-primary font-weight-bold py-2 px-4">Edit</button>
    </div>
  </div>
  
  </div>

</info-profile>

@endif
@endsection