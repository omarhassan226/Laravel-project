<?php

use App\Http\Controllers\FlightsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\User\UserController;
use App\Models\Flight;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome/{id}', [WelcomeController::class, 'welcomeFromChildController']);

Route::get('/user/{id}', [UserController::class, 'getUser']);

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Admin Dashboard";
    })->name('dashboard');
    Route::get('/users', function () {
        return "Admin Users";
    })->name('users');
});

Route::get('/users', [UserController::class, 'getAllUsers'])->name('allUsers');

// Main App For Testing
Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::fallback(function () {
    return "404 Page Not Found";
});

//Flight Routes
Route::get('/all-flights', [FlightsController::class, 'getAllFlights'])->name('allFlights');
Route::get('/create-flight', [FlightsController::class, 'getCreateFlightPage'])->name('createFlight');
Route::post('/store', [FlightsController::class, 'storeFlight'])->name('storeFlight');
