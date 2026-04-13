<?php

namespace App\Http\Controllers;

use App\Http\Requests\createFlightRequest;
use App\Models\Airline;
use App\Models\City;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightsController extends Controller
{
    public function getAllFlights()
    {
        //Eloquent ORM Model
        // $flights = Flight::where('flight_number', '!=', null)->orderBy('created_at', 'desc')->take(20)->paginate(10);

        //Query Builder
        $flights = DB::table('flights')->orderBy('created_at', 'desc')->take(20)->paginate(10);

        return view('pages.flights-page', ['flights' => $flights]);
    } 

    public function getCreateFlightPage()
    {
        $airlines = Airline::orderBy('name')->get();
        $cities = City::orderBy('name')->get();

        return view('pages.create-flight', compact('airlines', 'cities'));
    }

    public function storeFlight(createFlightRequest $request)
    {
        // $validatedData = $request->validate([
        //     'flight_number' => 'required|string|max:255',
        //     'airline' => 'required|string|max:255',
        //     'departure_city' => 'required|string|max:255',
        //     'arrival_city' => 'required|string|max:255',
        //     'departure_time' => 'required|date',
        //     'arrival_time' => 'required|date|after:departure_time',
        //     'duration' => 'required|integer|min:1',
        //     'price' => 'required|numeric|min:0',
        //     'seats' => 'required|integer|min:1'
        // ]);

        Flight::create($request->validated());

        return redirect()->route('allFlights')->with('success', 'Flight created successfully!');
    }

    public function getEditFlightPage($id)
    {
        $flight = Flight::find($id);
        $airlines = Airline::orderBy('name')->get();
        $cities = City::orderBy('name')->get();

        return view('pages.edit-flight', compact('flight', 'airlines', 'cities'));
    }

    public function updateFlight(Request $request, $id)
    {
        $flight = Flight::find($id);
        $flight->update($request->all());

        return redirect()->route('allFlights')->with('success', 'Flight updated successfully!');
    }

    public function deleteFlight($id)
    {
        $flight = Flight::find($id);
        $flight->delete();

        return redirect()->route('allFlights')->with('success', 'Flight deleted successfully!');
    }

    public function calculateDuration(Request $request)
    {
        $validatedData = $request->validate([
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
        ]);

        $departureTime = $validatedData['departure_time'];
        $arrivalTime = $validatedData['arrival_time'];

        $duration = strtotime($arrivalTime) - strtotime($departureTime);

        return response()->json(['duration' => $duration]);
    }
}
