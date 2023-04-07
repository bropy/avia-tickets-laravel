@extends('layout')

@section('title', 'GATEBOOK - Look for airport')
@section('content')
    <form action="{{ route('searchSchedule') }}" method="POST">   
    @csrf     
    <label for="airportSelect">Airport:</label>
<select name="airport" id="airportSelect">
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
<input type="date" id="depdate" min="2023-04-02">
<button type="submit">Submit</button>
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
    const airportSelect = document.getElementById('airportSelect');
    const airportOptions = airportSelect.getElementsByTagName('option');
    const search = document.getElementById('airportSearch');

    const airportValues = Array.from(airportOptions).map((option) => ({
        code: option.value.toLowerCase(),
        name: option.text.toLowerCase()
    }));

    search.addEventListener('input', () => {
        const term = search.value.toLowerCase();
        for (let i = 0; i < airportOptions.length; i++) {
            if (airportValues[i].code.includes(term) || airportValues[i].name.includes(term)) {
                airportOptions[i].style.display = '';
            } else {
                airportOptions[i].style.display = 'none';
            }
        }
    });
    
</script>
@endsection