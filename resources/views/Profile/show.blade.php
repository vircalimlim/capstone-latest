@extends('layouts.app')
@section('content')

<!-- <h3>{{$profile->lastname}}</h3> -->
@if( !$student && !$work) 
<!-- if($work || $student) -->

<show-profile profileid="{{$profile->id}}"></show-profile>

@else
{{$profile->work}}
<span>Display dara of work</span>

<css-loader></css-loader>



@endif
@endsection