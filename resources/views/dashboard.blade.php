@extends('layouts.app')

@section('content')

<div class="p-2">
  <div class="row justify-content-around mb-3 mt-3 border border-success p-2 rounded">
    
    <div class="col-12 p-1 col-sm-6 col-md-4">
    <div class="borfder borfder-success p-2 rounded">
    
      <div class="row">
      <div class="col-8  pl-3">
      <h4 class="font-weight-light">Patients</h4>
      <dash-board :male="{{$profiles->where('gender', 'male')->count()}}" :female="{{$profiles->where('gender', 'female')->count()}}"></dash-board>
      </div>
      </div>
      
      <div class="row">
        <div class="col-12 text-right text-light border-top border-light">
          <a class="text-light" href="/profile">View</a>
        </div>
      </div>
  
    </div>
    </div>

    <div class="col-12 p-1 col-sm-6 col-md-6">
    <div class="borfder bordfer-success p-2 rounded">
      
      <div class="row">
        
        <div class="col-12  pl-3 ">
          <h4 class="font-weight-light">Daily Summary</h4>
          <ul class="list-group">
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              Check-up
              <span class="badge badge-primary badge-pill" style="font-size: 14px">{{$checkup}}</span>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              Added patients
              <span class="badge badge-primary badge-pill" style="font-size: 14px">{{$patient}}</span>
            </li>
            <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              Added Medicine
              <span class="badge badge-primary badge-pill" style="font-size: 14px">{{$med}}</span>
            </li>
          </ul>
        </div>
        
      </div>
  
    </div>
    </div>
    
    <div class="col-12 p-1 col-sm-12 col-md-12">
    <div class="bordefr bordfer-success  p-2 rounded">
      
      <div class="row justify-content-center">
        <div class="col-12 text-center  pl-3">

        <h4 class="font-weight-light">Available Medicine</h4>
          <ul class="list-group">
            @foreach($medicines->take(5) as $medicine)
            <li  class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              {{$medicine->med_name}}
              <span class="badge badge-primary badge-pill" style="font-size: 14px">{{$medicine->quantity}}</span>
            </li>
            @endforeach
            <a href="/medicine" class="text-primary list-group-item list-group-item-action d-flex justify-content-center align-items-center">
              View All
            </a>
          </ul>

        </div>
      </div>
      
     <!-- <div class="row">
        <div class="col-12 text-right ">
          <a class="" href="/medicine">View</a>
        </div>
      </div> -->
  
    </div>
    </div>

      
  </div>
</div>
@endsection