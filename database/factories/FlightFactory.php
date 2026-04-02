<?php

namespace Database\Factories;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'flight_number' => fake()->bothify('FL###'),
            'airline' => fake()->company(),
            'departure_city' => fake()->city(),
            'arrival_city' => fake()->city(),
            'departure_time' => fake()->dateTime(),
            'arrival_time' => fake()->dateTime(),
            'duration' => rand(60, 500),
            'price' => rand(100, 1000),
            'seats' => rand(50, 300),
        ];
    }
}