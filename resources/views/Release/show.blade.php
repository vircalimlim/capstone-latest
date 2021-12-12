@extends('layouts.app')
@section('content')

<div class="row">
  <div class="col mt-4 px-2">
    <a href="/profile/{{$profile->id}}" class="btn btn-outline-secondary">Back</a>
  </div>
</div>

<div class="row px-2 pb-4 pt-2 justify-content-center">
    <div class="col-12 col-md-12 border shadow-sm bg-white pb-4 rounded text-dark">

    <div class="row py-3">
        <div class="col border-bottom border-info text-lizght py-2 headings">
        <h3 class="text-capitalize">Received medicine</h3>
        </div>
    </div>

    <div class="row align-items-center pl-3 pb-3">
    <div class="col text-primary py-2 headings">
      <h5 class="text-uppercase font-weight-bold m-0">{{$profile->lastname}}, {{$profile->firstname}} {{$profile->middlename}}</h5>
      <p class="m-0">{{$profile->houseNum}} Sitio Bokig Brgy. Abonagan Malasiqui, Pangasinan </p>
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
        
        @foreach($profiles as $med)
        <tr>
          <td>{{$med->med_name}}</td>
          <td>{{$med->pivot->date_released}}</td>
          <td>{{$med->pivot->quantity}}</td>
          <td>{{$med->pivot->concern}}</td>
        </tr>
        @endforeach
        
      </table>
      
      <div class="row justify-content-center">
        <div class="">{!! $profiles->links() !!}</div>
      </div>

    </div>
    </div>

    </div>
</div>

@endsection