@extends('layouts')
@section('content')
  <h1>Flight Search Results</h1>
  <p>Showing results for: {{ $passengerName }}</p>
  
  <table>
    <thead>
      <tr>
        <th>Carrier</th>
        <th>Flight Number</th>
        <th>Departure Airport</th>
        <th>Departure Time</th>
        <th>Arrival Airport</th>
        <th>Arrival Time</th>
        <th>Duration</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($flightData as $flight)
        <tr>
          <td>{{ $flight['carrier'] }}</td>
          <td>{{ $flight['flightNumber'] }}</td>
          <td>{{ $flight['departureAirport'] }}</td>
          <td>{{ $flight['departureTime'] }}</td>
          <td>{{ $flight['arrivalAirport'] }}</td>
          <td>{{ $flight['arrivalTime'] }}</td>
          <td>{{ $flight['duration'] }}</td>
          <td>
            <form method="POST" action="{{ route('formTicket'}}">
              @csrf
              <button type="submit">Book</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
