<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlightController extends Controller
{
    public function formTicket(Request $request){
        $imagePath = public_path('img/existing-image.jpg');

        // Create a new Intervention Image instance from the existing image
        $img = Image::make($imagePath);
    
        // Get the text from the form inputs
        $name = $request->input('passengerName');
        $from = $request->input('departureAirport');
        $date = $request->input('departureTime');
        $to = $request->input('arrivalAirport');
        $flightnum = $request->input('flightNumber');
        // Set the starting position for the first line of text
        $x = 120;
        $y = 100;
    
        // Add the first line of text to the image
        $img->text($text1, $x, $y, function($font) {
            $font->size(24);
            $font->color('#000000');
        });
    
        // Increment the y-coordinate for the next line of text
        $y += 30;
    
        // Add the second line of text to the image
        $img->text($text2, $x, $y, function($font) {
            $font->size(24);
            $font->color('#000000');
        });
    
        // Increment the y-coordinate again for the third line of text
        $y += 30;
    
        // Add the third line of text to the image
        $img->text($text3, $x, $y, function($font) {
            $font->size(24);
            $font->color('#000000');
        });
    
        // Save the modified image
        $img->save('path/to/new/image.jpg');
    
        // Return a response to the user
        return 'Image created successfully!';
    }
    public function searchFlights(Request $request)
    {
        // Validate form data
        
        $request->validate([
            'passname' => ['required', 'string', 'max:255'],
        ]);
    
        // Validate the departure and arrival airports
        $request->validate([
            'depairport' => ['required', 'string', 'max:255'],
            'arrairport' => ['required', 'string', 'max:255'],
        ]);
    
        // Validate the departure date
        $request->validate([
            'depdate' => ['required', 'date_format:Y-m-d'],
        ]);
    
        // If the validation passes, continue with the flight search logic
        $passengerName = $request->input('passname');
        $departureAirport = $request->input('depairport');
        $arrivalAirport = $request->input('arrairport');
        $departureDate = $request->input('depdate');

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://flight-info-api.p.rapidapi.com/schedules?version=v1&DepartureDate={$departureDate}&DepartureAirport={$departureAirport}&ArrivalAirport={$arrivalAirport}",
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
            return redirect()->back()->withErrors(['api_error' => "API Error: " . $err])->withInput();
        }

        // Parse flight data from API response
        $flights = json_decode($response, true);

        if (empty($flights)) {
            return redirect()->back()->withErrors(['api_error' => "No flights found for the selected criteria."])->withInput();
        }

        // Prepare flight data for display in table
        $flightData = [];
        foreach ($flights as $flight) {
            $flightData[] = [
                'carrier' => $flight['MarketingAirline']['Code'],
                'flightNumber' => $flight['MarketingAirline']['Code'] . $flight['FlightNumber'],
                'departureAirport' => $flight['DepartureAirport']['Code'],
                'departureTime' => $flight['DepartureTime'],
                'arrivalAirport' => $flight['ArrivalAirport']['Code'],
                'arrivalTime' => $flight['ArrivalTime'],
                'duration' => $flight['FlightDuration'],
            ];
        }

        // Render flight table view
        return view('flights', [
            'flightData' => $flightData,
            'passengerName' => $request->input('passname'),
        ]);
    }
}
