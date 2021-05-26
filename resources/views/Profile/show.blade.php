@extends('layouts.app')
@section('content')

<!-- <h3>{{$profile->lastname}}</h3> -->
@if( !$student && !$work && $profile->status !== 0)
<!-- if($work || $student) -->
  


<show-profile work="" student="" obj-profile="{{$profile}}"></show-profile>




@else
<info-profile>
  <div class="info-wrapper text-secondary d-none">
    
  <div class="row pb-3">
    <div class="col text-center ">
      <h3 class="font-weight-light">Personal Information</h3>
    </div>
  </div>
  
  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>House Number</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border-bottom px-3 py-2">
        {{ $profile->houseNum }}
      </p>
    </div>
  </div>
  
  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>First Name</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border-bottom px-3 py-2">
        {{ $profile->firstname }}
      </p>
    </div>
  </div>

  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Middle Name</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border-bottom px-3 py-2">
        {{ $profile->middlename }}
      </p>
    </div>
  </div>

  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Last Name</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border-bottom px-3 py-2">
        {{ $profile->lastname }}
      </p>
    </div>
  </div>


  <div class="row align-items-center pb-3">
    <div class="col-3 col-sm-3 col-md-3">
      <label><strong>Age</strong></label>
    </div>
    <div class="col-9 col-sm-3 col-md-3">
      <p class="border-bottom px-3 py-2">
        {{ $profile->age }}
      </p>
    </div>

    <div class="col-3 col-sm-3 col-md-3">
      <label><strong>Gender</strong></label>
    </div>
    <div class="col-9 col-sm-3 col-md-3">
      <p class="border-bottom px-3 py-2">
        {{ $profile->gender }}
      </p>
    </div>
  </div>

  
  @if($profile->work)
  
  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Work/Profession</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border-bottom px-3 py-2">
        {{ $profile->work->profession }}
      </p>
    </div>
  </div>
  
  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Workplace</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border-bottom px-3 py-2">
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
      <p class="border-bottom px-3 py-2">
        {{ $profile->student->school }}
      </p>
    </div>
  </div>
  
  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Educational Level</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border-bottom px-3 py-2">
        {{ $profile->student->educ_level }}
      </p>
    </div>
  </div>
  
  <div class="row align-items-center pb-2">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Grade/Year Level</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="border-bottom px-3 py-2">
        {{ $profile->student->year_level }}
      </p>
    </div>
  </div>
  
  @endif
  
  <div class="text-right">
    <div class="d-inline p-2">
      <a href="/profile/{{$profile->id}}/edit" role="button" class="btn btn-outline-success font-weight-bold py-2 px-4">Edit</a>
    </div>

    <div class="d-inline py-2">
      <form class="d-inline" method="POST" action="/profile/{{$profile->id}}/delete">
        @csrf
        @method('DELETE')
      <button class="btn btn-danger font-weight-bold py-2 px-4">Delete</button>
      </form>
    </div>
  </div>
  
  </div>

</info-profile>

@endif
@endsection