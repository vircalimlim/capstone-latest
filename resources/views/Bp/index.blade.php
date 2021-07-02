@extends('layouts.app')
@section('content')

<div class="border p-4 bg-white">
   <div class="row">
     <div class="col">
       <h3>Residents Blood Pressure Table</h3>
     </div>
   </div>
   
  <div class="row">
    <div class="col">
      <table class="table table-hover">
        <tr>
          <th>Resident Name</th>
          <th>Blood Pressure</th>
          <th>Checkup Date</th>
          <th>Condition</th>
          <th>Action</th>
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