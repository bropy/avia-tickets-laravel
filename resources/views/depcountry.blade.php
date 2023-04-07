@extends('layout')

@section('title', 'GATEBOOK - Look for airport')
@section('content')
    <form action="{{ route('searchFlights') }}" method="GET">     
    @csrf
    <label for="departureAirportSelect">Departure airport:</label>
    <select name="departureAirportSelect" id="departureAirportSelect">
        @php
        $printedPorts = [];
        $sortedAirports = $airports->sortBy('Code');
        @endphp
        @foreach ($sortedAirports as $airport)
            @if (!empty($airport->Code) && !in_array($airport->Code, $printedPorts))
                <option value="{{ $airport->Code }}">{{ $airport->Code }} - {{ $airport->Airport }}</option>
                @php
                $printedPorts[] = $airport->Code;
                @endphp
            @endif
        @endforeach
    </select>
    <label for="arrivalAirportSelect">Arrival airport:</label>
    <select name="arrivalAirportSelect" id="arrivalAirportSelect">
        @php
        $printedPorts = [];
        $sortedAirports = $airports->sortBy('Code');
        @endphp
        @foreach ($sortedAirports as $airport)
            @if (!empty($airport->Code) && !in_array($airport->Code, $printedPorts))
                <option value="{{ $airport->Code }}">{{ $airport->Code }} - {{ $airport->Airport }}</option>
                @php
                $printedPorts[] = $airport->Code;
                @endphp
            @endif
        @endforeach
    </select>
    <input type="text" id="airportSearch" placeholder="Search for an airport...">
    <label for="depdate">Departure date:</label>
    <input type="date" id="depdate" min="2023-03-16">
    <label for="passname">Passanger full name</label>
    <input type="text" name="passname" id="passname">
    <button type="submit" onclick="getFlightData()" >Submit</button>

    </form>
    <style>
        input[type="date"] {
        border: 1px solid #ccc;
        padding: 5px;
        border-radius: 5px;
        background-color: #fff;
        color: #000;
        font-size: 16px;
        margin-bottom:10px;
        }
        label {
        display: block;
        margin-bottom: 5px;
        }

        select, input[type="text"], button {
        display: block;
        margin-bottom: 10px;
        font-size: 16px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        }

        select:focus, input[type="text"]:focus {
        outline: none;
        border-color: #007bff;
        }

        button {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
        }

        button:hover {
        background-color: #0062cc;
        }
        label {
        display: block;
        margin-bottom: 10px;
        font-size: 18px;
        color: #555;
        text-transform: uppercase;
        }
        form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const departureSelect = document.getElementById('departureAirportSelect');
    const departureOptions = departureSelect.getElementsByTagName('option');
    const arrivalSelect = document.getElementById('arrivalAirportSelect');
    const arrivalOptions = arrivalSelect.getElementsByTagName('option');
    const search = document.getElementById('airportSearch');

    const airportValues = Array.from(departureOptions).map((option) => ({
        code: option.value.toLowerCase(),
        name: option.text.toLowerCase()
    }));

    search.addEventListener('input', () => {
        const term = search.value.toLowerCase();
        for (let i = 0; i < departureOptions.length; i++) {
            if (airportValues[i].code.includes(term) || airportValues[i].name.includes(term)) {
                departureOptions[i].style.display = '';
                arrivalOptions[i].style.display = '';
            } else {
                departureOptions[i].style.display = 'none';
                arrivalOptions[i].style.display = 'none';
            }
        }
    });
    
</script>
<script>
function getFlightData() {
    // Get the selected airport codes and departure date
    var departureAirport = document.getElementById("departureAirportSelect").value;
    var arrivalAirport = document.getElementById("arrivalAirportSelect").value;
    var departureDate = document.getElementById("depdate").value;

    // Make an AJAX request to the controller function
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Parse the response data as JSON
            var flightData = JSON.parse(xhr.responseText);

            // Generate the flight data table dynamically
            var flightTable = "<table><thead><tr><th>Flight Number</th><th>Departure Time</th><th>Arrival Time</th><th>Duration</th><th>Price</th><th>Select</th></tr></thead><tbody>";
            for (var i = 0; i < flightData.length; i++) {
                flightTable += "<tr><td>" + flightData[i].FlightNumber + "</td><td>" + flightData[i].DepartureTime + "</td><td>" + flightData[i].ArrivalTime + "</td><td>" + flightData[i].Duration + "</td><td>" + flightData[i].Price + "</td><td><button type='button' onclick='selectFlight(" + JSON.stringify(flightData[i]) + ")'>Select</button></td></tr>";
            }
            flightTable += "</tbody></table>";

            // Update the flight data table HTML
            document.getElementById("flightDataTable").innerHTML = flightTable;
        }
    };
    xhr.open("GET", "{{ route('searchFlights') }}?departureAirport=" + departureAirport + "&arrivalAirport=" + arrivalAirport + "&departureDate=" + departureDate, true);
    xhr.send();
}

function selectFlight(flightData) {
    // Do something with the selected flight data, e.g. save it to the server
    console.log(flightData);
}
</script>
@endsection