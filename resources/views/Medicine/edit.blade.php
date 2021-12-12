@extends('layouts.app')
@section('content')

<div class="row mt-md-3 py-2 justify-content-around">
<div class="py-4 px-4 text-secondary rounded shadow-sm bg-white font-weight-light col-12 col-md-11 col-lg-9">
  
    <form class="d-inline" method="POST" action="/medicine/{{$medicine->id}}">
      @csrf
      @method('PATCH')

      <div class="info-wrapper text-secondary d-nozssne">
  
  <div class="row pb-3">
    <div class="col text-center ">
      <h3 class=" font-weight-light">Edit Medicine Information</h3>
    </div>
  </div>
  
  <div class="row align-items-center">

    <div class="col-12 col-sm-12 col-md-6 mb-4">
      <div class=" font-weight-bold">
      <label>Medicine Name</label>
      </div>
  
      <input type="text" class="form-control @error('med_name') is-invalid @enderror" name="med_name" value="{{ $medicine->med_name }}" autofocus="true" />
      @error('med_name')
      <div class="text-danger">
        <small> {{$message}}</small>
      </div>
      @enderror
    </div>

    <div class="col-12 col-sm-12 col-md-6 mb-4">
      <div class=" font-weight-bold">
      <label>Medicine Type</label>
      </div>
  
      <input type="text" class="form-control @error('med_type') is-invalid @enderror" name="med_type" value="{{ $medicine->med_type }}" autofocus="true" />
      @error('med_type')
      <div class="text-danger">
        <small> {{$message}}</small>
      </div>
      @enderror
    </div>

    <div class="col-12 col-sm-12 col-md-6 mb-4">
      <div class=" font-weight-bold">
      <label>Quantity</label>
      </div>
  
      <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $medicine->quantity }}" autofocus="true" />
      @error('quantity')
      <div class="text-danger">
        <small> {{$message}}</small>
      </div>
      @enderror
    </div>

    <div class="text-right col-12">
        <div class="d-inline p-2">
        <a href="/medicine" role="button" class="btn btn-outline-secondary font-weight-bold py-2 px-4">Back</a>
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