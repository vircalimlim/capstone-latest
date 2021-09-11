@extends('layouts.app')
@section('content')
   
<div class="row">
  <div class="col mt-4 ">
    <a href="/profile" class="btn btn-outline-secondary">Show Patients</a>
  </div>
</div>

    <div class="card bg-white mt-3">
        <div class="card-header">
            <h3 class="text-secondary">Import Patient Data</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
            </form>
        </div>
    </div>

   
@endsection