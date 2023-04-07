@extends('layout')

@section('title', 'GATEBOOK - set cyties for ticket')

@section('content')
    <form action="/depcity" method="POST">
            @csrf
            <h1>here</h1>
</form>
@endforeach
            <!--<h1>Set departure city</h1>
            <select name="depct" id="">
            @php
        $printedCities = [];
        $sortedCities = $airports->sortBy('City');
    @endphp
    @foreach ($sortedCities as $airport)
        @if (!empty($airport->City) && !in_array($airport->City, $printedCities))
            <option value="{{ $airport->City }}">{{ $airport->City }}</option>
            @php
                $printedCities[] = $airport->City;
            @endphp
        @endif
    @endforeach
            </select>
            <br>
            <h1>Set arrival country</h1>
            <select name="depct" id="">
            @php
        $printedCities = [];
        $sortedCities = $airports->sortBy('City');
    @endphp
    @foreach ($sortedCities as $airport)
        @if (!empty($airport->City) && !in_array($airport->City, $printedCities))
            <option value="{{ $airport->City }}">{{ $airport->City }}</option>
            @php
                $printedCities[] = $airport->City;
            @endphp
        @endif
    @endforeach
            </select>
            <br>

            </select>
            <br>
            <button>Next step</button>
        </form>!-->
@endsection