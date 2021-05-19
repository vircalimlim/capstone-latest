@extends('layouts.app')
@section('content')


<index-profile>
  

  <table class="table d-none shadow-lg text-light table-striped table-hover table-dark">
    
    <tr>
      <th class="p-2">First Name</th>

      <th class="p-2">Middle Name</th>

      <th class="p-2">Last Name</th>
      
      <th class="p-2">Action</th>
    </tr>
    
    @forelse($profiles as $profile)
    <tr>
      
      <td class="p-2">{{ $profile->firstname }}</td>
      
      <td class="p-2">{{ $profile->middlename }}</td>
      
      <td class="p-2">{{ $profile->lastname }}</td>
      
      <td class="p-2">
      <small>
        <a href="/profile/{{ $profile->id }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"> <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/> <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/> </svg>
        View</a>
        </small>
        </td>
    </tr>
    @empty
    <h1>Empty</h1>
    @endforelse
    
  </table>

</index-profile>


@endsection