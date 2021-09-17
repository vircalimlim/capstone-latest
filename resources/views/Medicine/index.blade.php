@extends('layouts.app')
@section('content')

<div class="border mt-4 p-4 bg-white">
  
  <div class="row border-bottom">
    <h3 class="p-2">Medicine Records</h3>
  </div>
  <div class="row">
    <div class="col">
      <table class="table">
        <tr>
          <th>Name</th>
          <th>Type</th>
          <th>Quantity</th>
          <th>Date Received</th>
          
        @foreach($medicines as $medicine)
        </tr>
          <td>{{ $medicine->med_name }}</td>
          <td>{{ $medicine->med_type }}</td>
          <td>{{ $medicine->quantity }}</td>
          <td>{{ $medicine->date_received }}</td>
        <tr>
        @endforeach
          
        </tr>
      </table>
      <div class="row justify-content-center">
      <div class="">{!! $medicines->links() !!}</div>
      </div>
    </div>
  </div>
</div>

@endsection