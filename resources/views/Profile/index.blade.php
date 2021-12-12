@extends('layouts.app')
@section('content')

<index-profile :obj-profiles="{{ $profiles }}" :obj-user="{{ $user }}"></index-profile>

@endsection