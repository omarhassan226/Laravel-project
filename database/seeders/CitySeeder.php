<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            // Middle East
            ['name' => 'Dubai', 'country' => 'UAE'],
            ['name' => 'Abu Dhabi', 'country' => 'UAE'],
            ['name' => 'Sharjah', 'country' => 'UAE'],
            ['name' => 'Riyadh', 'country' => 'Saudi Arabia'],
            ['name' => 'Jeddah', 'country' => 'Saudi Arabia'],
            ['name' => 'Dammam', 'country' => 'Saudi Arabia'],
            ['name' => 'Medina', 'country' => 'Saudi Arabia'],
            ['name' => 'Doha', 'country' => 'Qatar'],
            ['name' => 'Muscat', 'country' => 'Oman'],
            ['name' => 'Kuwait City', 'country' => 'Kuwait'],
            ['name' => 'Bahrain', 'country' => 'Bahrain'],
            ['name' => 'Amman', 'country' => 'Jordan'],
            ['name' => 'Beirut', 'country' => 'Lebanon'],

            // Africa
            ['name' => 'Cairo', 'country' => 'Egypt'],
            ['name' => 'Alexandria', 'country' => 'Egypt'],
            ['name' => 'Sharm El Sheikh', 'country' => 'Egypt'],
            ['name' => 'Hurghada', 'country' => 'Egypt'],
            ['name' => 'Luxor', 'country' => 'Egypt'],
            ['name' => 'Casablanca', 'country' => 'Morocco'],
            ['name' => 'Tunis', 'country' => 'Tunisia'],
            ['name' => 'Algiers', 'country' => 'Algeria'],

            // Europe
            ['name' => 'London', 'country' => 'United Kingdom'],
            ['name' => 'Paris', 'country' => 'France'],
            ['name' => 'Frankfurt', 'country' => 'Germany'],
            ['name' => 'Amsterdam', 'country' => 'Netherlands'],
            ['name' => 'Istanbul', 'country' => 'Turkey'],
            ['name' => 'Rome', 'country' => 'Italy'],
            ['name' => 'Madrid', 'country' => 'Spain'],
            ['name' => 'Munich', 'country' => 'Germany'],
            ['name' => 'Zurich', 'country' => 'Switzerland'],

            // Americas
            ['name' => 'New York', 'country' => 'USA'],
            ['name' => 'Los Angeles', 'country' => 'USA'],
            ['name' => 'Chicago', 'country' => 'USA'],
            ['name' => 'Washington D.C.', 'country' => 'USA'],
            ['name' => 'Toronto', 'country' => 'Canada'],

            // Asia
            ['name' => 'Singapore', 'country' => 'Singapore'],
            ['name' => 'Tokyo', 'country' => 'Japan'],
            ['name' => 'Hong Kong', 'country' => 'China'],
            ['name' => 'Kuala Lumpur', 'country' => 'Malaysia'],
            ['name' => 'Bangkok', 'country' => 'Thailand'],
            ['name' => 'Mumbai', 'country' => 'India'],
            ['name' => 'Delhi', 'country' => 'India'],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }

        $this->command->info('🌍  ' . count($cities) . ' cities seeded successfully!');
    }
}
