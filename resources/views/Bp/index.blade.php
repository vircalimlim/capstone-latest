@extends('layouts.app')
@section('content')

<div class="border p-4 mt-3 bg-white">
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
          <th>Action</th>
        </tr>

        
        @forelse($bloods as $blood)
        <tr>
          <td class="text-capitalize">{{ $blood->profile->firstname }} {{ $blood->profile->lastname}} </td>
          <td>{{ $blood->sp }} / {{$blood->dp }}</td>
          <td>{{ $blood->check_date }}</td>
          <td>
            <span class="px-1 text-success">Edit</span>
            <span class="px-1 text-danger">Delete</span>
          </td>
        </tr>

        @empty
        <caption>
          <h3 class="row text-secondary justify-content-center">Empty Data</h3>
        </caption>
        @endforelse
        
      </table>
    </div>
  </div>
  
</div>

@endsection