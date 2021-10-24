@extends('layouts.app')
@section('content')

<div class="row px-3 text-break">
    <div class="pd-2 col-12 col-md-12">

  <div class="row pt-4 px-1">
    <div class="px-0 pb-2 col-6 text-left">
      <a class="btn btn-outline-success" href="/medicine/create">Add medicine</a>
    </div>
    <div class="px-0 pb-2 col-6 text-right">
      <a class="btn btn-primary" href="{{ route('importExportView') }}">Import</a>
      <a class="btn btn-outline-secondary" href="{{ route('export') }}">Export</a>
    </div>
  </div>

</div>
</div>

<div class="border p-4 bg-white">
  
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