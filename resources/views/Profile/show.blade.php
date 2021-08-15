@extends('layouts.app')
@section('content')

<div class="row pt-4 pb-0">
  <div class="col">
    <!--<a href="/profile" role="button" class="btn btn-outline-secondary">Show all records</a> -->
  </div>
</div>

<div class="row px-2 pb-4 pt-3 justify-content-center">
<div class="col-12 col-md-8 border shadow-sm bg-white pb-4 rounded text-dark">
  
  <div class="info-wrapper text-secondary">
    
  <div class="row py-3">
    <div class="col border-bottom border-info text-lizght py-2 headings">
      <h3 class="">Patient Information</h3>
    </div>
  </div>
  
  <div class="row align-items-center pl-3 pb-3">
    <div class="d-none col-md-2 d-md-block">
      <img src="sjsj.png" alt="image">
    </div>
    <div class="col text-primary py-2 headings">
      <h5 class="text-uppercase font-weight-bold m-0">{{$profile->lastname}}, {{$profile->firstname}} {{$profile->middlename}}</h5>
      <p class="m-0">{{$profile->houseNum}} Sitio Bokig Brgy. Abonagan Malasiqui, Pangasinan </p>
    </div>
  </div>
  
  <div class="row px-3 mb-3">
    <div class="col-12 bg-light">
      <h5 class="pt-2">Basic Information</h5>
    </div>
  </div>
  
  
  <div class="row align-items-center pl-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Date of Birth</strong></label>
    </div>
    
    <div class="col-12 col-sm-8 col-md-8">
      <p class=" px-3">
        07/21/2021
      </p>
    </div>
  </div>


  <div class="row align-items-center pl-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Age</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class=" px-3">
        {{ $profile->age }}
      </p>
    </div>

    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Gender</strong></label>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
      <p class="text-capitalize px-3">
        {{ $profile->gender }}
      </p>
    </div>
  </div>
  
  <div class="row align-items-center pl-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Birthplace</strong></label>
    </div>
    
    <div class="col-12 col-sm-8 col-md-8">
      <p class=" px-3">
        Malasiqui, Pangasinan
      </p>
    </div>
  </div>
  
  
  <div class="row align-items-center pl-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Civil Status</strong></label>
    </div>
    
    <div class="col-12 col-sm-8 col-md-8">
      <p class=" px-3">
        Single
      </p>
    </div>
  </div>
  
  <div class="row align-items-center pl-4">
    <div class="col-12 col-sm-3 col-md-3">
      <label><strong>Contact Number</strong></label>
    </div>
    
    <div class="col-12 col-sm-8 col-md-8">
      <p class=" px-3 ">
        09496127012
      </p>
    </div>
  </div>
  
  
  
  <div class="row px-3 my-3">
    <div class="col-12 bg-light">
      <h5 class="pt-2">Blood Pressure History</h5>
    </div>
  </div>
  
  <div class="row">
    <div class="col">
      <table class="table table-hover">
        <tr>
          <th>Blood Pressure</th>
          <th>Checkup Date</th>
          <th>Condition</th>
          <th>Action</th>
        </tr>

        
        @foreach($profile->blood as $blood)
        <tr>
          <td>{{ $blood->sp }} / {{$blood->dp }}</td>
          <td>{{ $blood->check_date }}</td>
          <td>
            @if($blood->sp > 89 && $blood->sp < 120 && $blood->dp > 60 && $blood->dp < 80)
            Normal
            
            @elseif($blood->sp < 90 || $blood->dp < 60)
            Hypotension
            
            @elseif($blood->sp > 120 && $blood->sp < 129 && $blood->dp < 80)
            Elevated
            
            @elseif($blood->sp > 129 && $blood->sp < 140 || $blood->dp > 79 && $blood->dp < 90)
            Stage 1 hypertension
            
            @elseif($blood->sp < 141 || $blood->dp < 91)
            Stage 2 hypertension
            
            @elseif($blood->sp > 140 && $blood->sp < 160 || $blood->dp > 90 && $blood->dp < 100)
            Stage 1 High Blood
            
            @elseif($blood->sp > 159 && $blood->sp < 180 || $blood->dp > 99 && $blood->dp < 120)
            Stage 2 High Blood
            
            @elseif($blood->sp >180 || $blood->dp >119)
            Hypertensive Crisis
            
            @endif
          </td>
          <td>
            <span class="px-1 text-danger">Delete</span>
          </td>
        </tr>
        
        @endforeach
        
      </table>
      <div class="row">
        <div class="col text-center">
          <a href="#" class="text-center">See more...</a>
        </div>
      </div>
    </div>
    </div>
    
  <div class="row px-3 my-3">
    <div class="col-12 bg-light">
      <h5 class="pt-2">Medicine Received</h5>
    </div>
  </div>
  
  <div class="row">
    <div class="col">
      <table class="table table-hover">
        <tr>
          <th>Medicine Name</th>
          <th>Release Date</th>
          <th>Quantity</th>
          <th>Concern</th>
        </tr>
        
        @foreach($profile->medicine->reverse()->take(2) as $med)
        <tr>
          <td>{{$med->med_name}}</td>
          <td>{{$med->pivot->date_released}}</td>
          <td>{{$med->pivot->quantity}}</td>
          <td>{{$med->pivot->concern}}</td>
        </tr>
        @endforeach
      </table>
      <div class="row px-4 py-2">
        <div class="col text-center bg-light rounded">
          <a href="#" class="text-center">See more...</a>
        </div>
      </div>
        
    </div>
  </div>

  
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

</div>

<div class="col-12 col-md-4">
  <div class="row px-md-2 py-2 py-md-0">
  <div class="col-12 border shadow-sm bg-white pb-4 rounded text-secondary">

  <div class="row py-3">
    <div class="col border-bottom border-info text-lizght py-2 headings">
      <h3 class="">Action</h3>
    </div>
  </div>
    
  <div class="row hover align-items-center pl-4 py-2">
    <div class="col">
      <label><strong>Monitor Blood Pressure</strong></label>
    </div>
    
    <div class="col">
      <a href="/bp/{{$profile->id}}" class="btn btn-outline-success px-3 ">
        Go
      </a>
    </div>
  </div>
  
  <div class="row hover align-items-center pl-4 py-2">
    <div class="col">
      <label><strong>Get Medicines </strong></label>
    </div>
    
    <div class="col">
      <a href="/releasemed/{{$profile->id}}" class="btn btn-outline-success px-3 ">
        Go
      </a>
    </div>
  </div>
  
  <div class="row hover align-items-center pl-4 py-2">
    <div class="col">
      <label><strong> Check-up </strong></label>
    </div>
    
    <div class="col">
      <a href="/checkup" class="btn btn-outline-success px-3 ">
        Go
      </a>
    </div>
    </div>

  </div>
  </div>
</div>

</div>


@endsection