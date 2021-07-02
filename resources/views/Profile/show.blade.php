@extends('layouts.app')
@section('content')


<div class="row px-2 py-4 justify-content-center">
<div class="col-12 col-md-10 border shadow-sm bg-white pb-4 rounded text-dark">
  
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
      <h5 class="font-weight-bold m-0">CALIMLIM VIRGILIO JR. PADILLA</h5>
      <p class="m-0">271 Sitio Bokig Brgy. Abonagan Malasiqui, Pangasinan </p>
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
      <p class=" px-3">
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
</div>

<div class="row px-2 pb-4 justify-content-center ">
<div class="col-12 col-md-10 border shadow-sm bg-white pb-4 rounded text-secondary">
  
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
      <a href="/releasemed" class="btn btn-outline-success px-3 ">
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

@endsection