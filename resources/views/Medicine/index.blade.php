@extends('layouts.app')
@section('content')

<index-med :obj-medicines="{{ $medicines }}" :obj-user="{{ $user }}"></index-med>

@endsection