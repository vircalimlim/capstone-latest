@extends('layouts.app')
@section('content')

<div class="row mt-md-3 py-2 justify-content-around">
<div class="py-4 px-4 text-secondary rounded shadow-sm bg-white font-weight-light col-12 col-md-11 col-lg-9">
  
    <form class="d-inline" method="POST" action="/profile/{{$profile->id}}">
      @csrf
      @method('PATCH')
  
  <div class="info-wrapper text-secondary d-nozssne">
  
  <div class="row pb-3">
    <div class="col text-center ">
      <h3 class=" font-weight-light">Edit Information</h3>
    </div>
  </div>
  
  <div class="row align-items-center">

    <div class="col-12 col-sm-12 col-md-4 mb-4">
      <div class=" font-weight-bold">
      <label>Household Number</label>
      </div>
  
      <input type="text" class="form-control @error('houseNum') is-invalid @enderror" name="houseNum" value="{{ $profile->houseNum }}" autofocus="true" />
      @error('houseNum')
      <div class="text-danger">
        <small> {{$message}}</small>
      </div>
      @enderror
    </div>

    <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class=" font-weight-bold">
    <label>Street Name</label>
  </div>
  <input placeholder="Street Name ex. Sitio or Purok" class="form-control @error('street') is-invalid @enderror" value="{{ $profile->street }}" type="text" name="street" autocomplete="street"/>
      @error('street')
      <div class="text-danger">
        <small> {{$message}}</small>
      </div>
      @enderror
  </div>
  
  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class="font-weight-bold">
    <label>Barangay</label>
  </div>
  <input placeholder="Barangay" class="form-control @error('barangay') is-invalid @enderror" value="{{ $profile->barangay }}" type="text" name="barangay" autocomplete="barangay"/>
     @error('barangay')
      <div class="text-danger">
        <small> {{$message}}</small>
      </div>
      @enderror
  </div>

  </div>
  
  <div class="row align-items-center">

    <div class="col-12 col-sm-12 col-md-4 mb-4">
      <div class=" font-weight-bold">
      <label>Firstname</label>
      </div>
      <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $profile->firstname }}" />
      @error('firstname')
      <div class="text-danger">
        <small> {{$message}}</small>
      </div>
      @enderror
    </div>

    <div class="col-12 col-sm-12 col-md-4 mb-4">
      <div class=" font-weight-bold">
      <label>Middlename</label>
      </div>
      <input type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ $profile->middlename }}" />
      @error('middlename')
      <div class="text-danger">
        <small> {{$message}}</small>
      </div>
      @enderror
    </div>

    <div class="col-12 col-sm-12 col-md-4 mb-4">
      <div class=" font-weight-bold">
      <label>Lastname</label>
      </div>
      <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $profile->lastname }}" />
      @error('lastname')
      <div class="text-danger">
        <small> {{$message}}</small>
      </div>
      @enderror
    </div>

  </div>

  <div class="row">

  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class="font-weight-bold">
    <label>Birthdate</label>
  </div>
  <input data-provide="datepicker" class="form-control @error('birthdate') is-invalid @enderror" value="{{ $profile->birthdate }}" name="birthdate" placeholder="date" type="date">
    @error('birthdate')
      <div class="text-danger">
        <small> {{$message}}</small>
      </div>
      @enderror
  </div>

  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class="font-weight-bold">
    <label>Age</label>
  </div>
  <input placeholder="Age" class="form-control @error('age') is-invalid @enderror" value="{{ $profile->age }}" type="number" name="age" autocomplete="age"/>
      @error('age')
      <div class="text-danger">
        <small> {{$message}}</small>
      </div>
      @enderror
  </div>

  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class="font-weight-bold">
    <label>Contact Number</label>
  </div>
  <input placeholder="Contact number ex. 09876543210" class="form-control @error('contact') is-invalid @enderror" value="0{{ $profile->contact }}" type="text" name="contact" autocomplete="contact"/>
      @error('contact')
      <div class="text-danger">
        <small> {{$message}}</small>
      </div>
      @enderror
  </div>

  <div class="col-12 col-sm-12 col-md-4 mb-4">
  <div class="font-weight-bold">
    <label>Gender</label>
  </div>

    <div class="row px-3">

    <select name="gender" class="form-control @error('gender') is-invalid @enderror">
        <option @if(strtolower($profile->gender) == 'male'  )  selected='selected' @endif value="male">Male</option>
        <option @if(strtolower($profile->gender) ==  'female' )  selected='selected' @endif value="Female">Female</option>
      </select>
  
      @error('gender')
      <div class="text-danger">
        <small> {{$message}}</small>
      </div>
      @enderror
    
  </div>
 
</div>

  
  
  </div>
  <div class="text-right">
    <div class="d-inline p-2">
      <a href="/profile/{{$profile->id}}" role="button" class="btn btn-outline-secondary font-weight-bold py-2 px-4">Back</a>
    </div>

    <div class="d-inline py-2">
      <button class="btn btn-success font-weight-bold py-2 px-4">Save</button>
    </div>
     
  </div>
  </form>
  </div>
  </div>

@endsection