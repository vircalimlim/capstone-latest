@extends('layouts.app')
@section('content')
    <div class="row py-3">
        <div class="col">
            <table class="table table-hover">
                <tr>
                    <th>Medicine Name</th>
                    <th>Release Date</th>
                    <th>Quantity</th>
                    <th>Concern</th>
                </tr>

                @foreach($profiles as $profile)
                    @foreach($profile->medicine as $med)
                    <tr>
                    <td>{{$med->med_name}}</td>
                    <td>{{$med->pivot->date_released}}</td>
                    <td>{{$med->pivot->quantity}}</td>
                    <td>{{$med->pivot->concern}}</td>
                    </tr>
                    @endforeach
                @endforeach
            </table>
            
                      
        </div>
    </div>
@endsection