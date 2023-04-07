@extends('layout')

@section('content')
<div class="container">
<h1>Flight Schedule Table</h1>
<div class="alert alert-success">
    {{ $message }}
</div><!--@if(isset($schedule))
    <table>
        <thead>
            <tr>
                <th>Flight Number</th>
                <th>Airline</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedule as $flight)
                <tr>
                    <td>{{ $flight['flightNumber'] }}</td>
                    <td>{{ $flight['airline'] }}</td>
                    <td>{{ $flight['origin'] }}</td>
                    <td>{{ $flight['destination'] }}</td>
                    <td>{{ $flight['departureTime'] }}</td>
                    <td>{{ $flight['arrivalTime'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No flight schedules found</p>
@endif!-->
@endsection
