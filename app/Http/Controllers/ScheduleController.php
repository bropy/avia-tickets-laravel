<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function searchSchedule(Request $request)
    {
        $validatedData = $request->validate([
            'airport' => 'required|string|max:255',
            'depdate' => 'required|date|after_or_equal:today',
        ]);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://flight-info-api.p.rapidapi.com/schedules?version=v1&DepartureDate=2023-04-04&DepartureAirport=LGW",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: flight-info-api.p.rapidapi.com",
            "X-RapidAPI-Key: b194ed1a42msh7c9b37975594305p13576ajsna345695551d3"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
    // Check for cURL errors
    if ($err) {
        return view('looktable', ['error' => 'cURL Error #' . $err]);
    }

    // Decode API response JSON into array
    $data = json_decode($response, true);

    // Check for API errors

    // Get flight schedule data from API response
    $schedule = array();
    foreach ($data['scheduledFlights'] as $flight) {
        $schedule[] = array(
            'flightNumber' => $flight['flightNumber'],
            'airline' => $flight['carrier']['fsCode'],
            'origin' => $flight['departureAirportFsCode'],
            'destination' => $flight['arrivalAirportFsCode'],
            'departureTime' => date('Y-m-d H:i', strtotime($flight['departureTime'])),
            'arrivalTime' => date('Y-m-d H:i', strtotime($flight['arrivalTime']))
        );
    }

    if (empty($data)) {
        return view('looktable', ['error' => '/No flight schedules found']);
    }

    //return redirect('looktable',compact('schedule'));
    $message = 'Form submitted successfully!';

    // Pass the $message variable to the results view
    return view('looktable',compact('message'));
    }
}?>