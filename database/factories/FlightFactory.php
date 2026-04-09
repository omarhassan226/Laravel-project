<?php

namespace Database\Factories;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends Factory<Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Real airlines with their IATA codes for realistic flight numbers.
     */
    protected array $airlines = [
        'EK' => 'Emirates',
        'QR' => 'Qatar Airways',
        'SV' => 'Saudia',
        'MS' => 'EgyptAir',
        'EY' => 'Etihad Airways',
        'TK' => 'Turkish Airlines',
        'LH' => 'Lufthansa',
        'BA' => 'British Airways',
        'AF' => 'Air France',
        'KL' => 'KLM Royal Dutch Airlines',
        'DL' => 'Delta Air Lines',
        'AA' => 'American Airlines',
        'UA' => 'United Airlines',
        'SQ' => 'Singapore Airlines',
        'CX' => 'Cathay Pacific',
        'NH' => 'ANA (All Nippon Airways)',
        'JL' => 'Japan Airlines',
        'FZ' => 'flydubai',
        'G9' => 'Air Arabia',
        'WY' => 'Oman Air',
    ];

    /**
     * Real cities used as departure/arrival destinations.
     */
    protected array $cities = [
        'Cairo',
        'Dubai',
        'Riyadh',
        'Jeddah',
        'Doha',
        'Abu Dhabi',
        'Istanbul',
        'London',
        'Paris',
        'Frankfurt',
        'Amsterdam',
        'New York',
        'Los Angeles',
        'Chicago',
        'Singapore',
        'Tokyo',
        'Hong Kong',
        'Kuala Lumpur',
        'Bangkok',
        'Mumbai',
        'Muscat',
        'Bahrain',
        'Kuwait City',
        'Amman',
        'Beirut',
        'Casablanca',
        'Tunis',
        'Algiers',
        'Rome',
        'Madrid',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Pick a random airline
        $airlineCode = fake()->randomElement(array_keys($this->airlines));
        $airlineName = $this->airlines[$airlineCode];

        // Generate realistic flight number (e.g. EK203, QR854)
        $flightNumber = $airlineCode . fake()->numberBetween(100, 999);

        // Pick departure and arrival cities (ensure they are different)
        $departureCity = fake()->randomElement($this->cities);
        do {
            $arrivalCity = fake()->randomElement($this->cities);
        } while ($arrivalCity === $departureCity);

        // Generate a departure time within the next 30 days
        $departureTime = Carbon::now()
            ->addDays(fake()->numberBetween(1, 30))
            ->setHour(fake()->numberBetween(0, 23))
            ->setMinute(fake()->randomElement([0, 15, 30, 45]))
            ->setSecond(0);

        // Duration between 1 and 16 hours (in days as decimal, stored as integer days)
        $durationHours = fake()->numberBetween(1, 16);
        $arrivalTime = $departureTime->copy()->addHours($durationHours);

        // Duration in days (rounded)
        $durationDays = (int) round($durationHours / 24, 0) ?: 1;

        // Price based on duration (longer flights = more expensive)
        $basePrice = fake()->numberBetween(80, 300);
        $price = round($basePrice * ($durationHours / 3), 2);

        // Seats count (realistic aircraft capacity ranges)
        $seats = fake()->randomElement([
            150, 160, 170, 180, 189,  // Narrow-body (A320, B737)
            220, 250, 280, 300,       // Wide-body (A330, B787)
            350, 380, 400, 440, 500,  // Large wide-body (A380, B777)
        ]);

        return [
            'flight_number'  => $flightNumber,
            'airline'        => $airlineName,
            'departure_city' => $departureCity,
            'arrival_city'   => $arrivalCity,
            'departure_time' => $departureTime,
            'arrival_time'   => $arrivalTime,
            'duration'       => $durationDays,
            'price'          => $price,
            'seats'          => $seats,
        ];
    }
}