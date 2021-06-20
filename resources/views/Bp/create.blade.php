@extends('layouts.app')
@section('content')
<div class="my-4 bg-white border p-4">
 
<h3>Blood Pressure Record Form</h3> 
<form method="POST" method="/bp">
@csrf
<div class="row">
  <div class="col-6">
    <label>Resident Name</label>
    <input type="text" class="form-control" placeholder="Resident Name" name="resident_name">
  </div>
  <div class="col-6">
    <label>Blood Pressure</label>
    <div class="row align-items-center">
    <input type="number" placeholder="Systolic Pressure Ex. 80 mmHg" class="form-control col-3 mx-2" name="sp">
    <h2 class="px-2 m-0 text-secondary">/</h2>
    <input type="number" placeholder="Diastolic Pressure Ex. 150 mmHg" class="form-control col-3 mx-2" name="dp">
    </div>
  </div>
</div>

<div class="row pt-3">
  <div class="col-6">
    <labwl>Date</label>
    <input class="form-control" data-provide="datepicker" name="check_date" placeholder="date" type="date">
  </div>
</div>

<div class="row pt-3">
  <div class="col-12">
  <button class="btn btn-primary" type="submit">Save</button>
  <input class="btn mx-2 btn-outline-secondary" type="reset" value="Clear">
  </div>
</div>
</form>

</div>

<div class="border p-4 bg-white">
   <div class="row">
     <div class="col">
       <h3>Residents Blood Pressure Table</h3>
     </div>
   </div>
   
  <div class="row">
    <div class="col">
      <table class="table">
        <tr>
          <th>Resident Name</th>
          <th>Blood Pressure</th>
          <th>Checkup Date</th>
          <th>Condition</th>
          <th>Action</th>
        </tr>

        <tr>
          <td>Marky Balboa</td>
          <td>90 / 130</td>
          <td>2021/06/07</td>
          <td class="">
            <span class="px-1 text-success">Edit</span>
            <span class="px-1 text-danger">Delete</span>
          </td>
        </tr>
        
        <tr>
          <td>Marky Balboa</td>
          <td>80 / 120</td>
          <td>2021/06/07</td>
          <td>
            <span class="px-1 text-success">Edit</span>
            <span class="px-1 text-danger">Delete</span>
          </td>
        </tr>
        
        <tr>
          <td>Marky Balboa</td>
          <td>90 / 160</td>
          <td>2021/06/07</td>
          <td>
            <span class="px-1 text-success">Edit</span>
            <span class="px-1 text-danger">Delete</span>
          </td>
        </tr>
        
        @foreach($bloods as $blood)
        <tr>
          <td>{{ $blood->resident_name }}</td>
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
            <span class="px-1 text-success">Edit</span>
            <span class="px-1 text-danger">Delete</span>
          </td>
        </tr>
        
        @endforeach
        
      </table>
    </div>
  </div>
  
</div>
@endsection