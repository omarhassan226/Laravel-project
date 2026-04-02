<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function getAllFlights()
    {
        $flights = Flight::all();
        // Log::info('Retrieved all flights', ['count' => $flights]);
        // return $flights;
        return view('pages.flights-page', ['flights' => $flights]);
    }

    public function getCreateFlightPage()
    {
        return view('pages.create-flight');
    }

    public function storeFlight(Request $request)
    {
        $validatedData = $request->validate([
            'flight_number' => 'required|string|max:255',
            'airline' => 'required|string|max:255',
            'departure_city' => 'required|string|max:255',
            'arrival_city' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'seats' => 'required|integer|min:1'
        ]);

        Flight::create($validatedData);

        return redirect()->route('allFlights')->with('success', 'Flight created successfully!');
    }
}
