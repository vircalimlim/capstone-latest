@extends('layouts.app')
@section('content')

<Report :obj-profiles="{{ $profiles }}"></Report>

@endsection