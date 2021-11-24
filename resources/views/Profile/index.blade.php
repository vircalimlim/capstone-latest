@extends('layouts.app')
@section('content')

<index-profile :obj-profiles="{{ $profiles }}"></index-profile>

@endsection