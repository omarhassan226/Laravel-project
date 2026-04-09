<?php

namespace Database\Seeders;

use App\Models\Airline;
use Illuminate\Database\Seeder;

class AirlineSeeder extends Seeder
{
    public function run(): void
    {
        $airlines = [
            ['code' => 'EK', 'name' => 'Emirates'],
            ['code' => 'QR', 'name' => 'Qatar Airways'],
            ['code' => 'SV', 'name' => 'Saudia'],
            ['code' => 'MS', 'name' => 'EgyptAir'],
            ['code' => 'EY', 'name' => 'Etihad Airways'],
            ['code' => 'TK', 'name' => 'Turkish Airlines'],
            ['code' => 'LH', 'name' => 'Lufthansa'],
            ['code' => 'BA', 'name' => 'British Airways'],
            ['code' => 'AF', 'name' => 'Air France'],
            ['code' => 'KL', 'name' => 'KLM Royal Dutch Airlines'],
            ['code' => 'DL', 'name' => 'Delta Air Lines'],
            ['code' => 'AA', 'name' => 'American Airlines'],
            ['code' => 'UA', 'name' => 'United Airlines'],
            ['code' => 'SQ', 'name' => 'Singapore Airlines'],
            ['code' => 'CX', 'name' => 'Cathay Pacific'],
            ['code' => 'NH', 'name' => 'ANA (All Nippon Airways)'],
            ['code' => 'JL', 'name' => 'Japan Airlines'],
            ['code' => 'FZ', 'name' => 'flydubai'],
            ['code' => 'G9', 'name' => 'Air Arabia'],
            ['code' => 'WY', 'name' => 'Oman Air'],
            ['code' => 'GF', 'name' => 'Gulf Air'],
            ['code' => 'KU', 'name' => 'Kuwait Airways'],
            ['code' => 'RJ', 'name' => 'Royal Jordanian'],
            ['code' => 'ME', 'name' => 'Middle East Airlines'],
            ['code' => 'AT', 'name' => 'Royal Air Maroc'],
        ];

        foreach ($airlines as $airline) {
            Airline::create($airline);
        }

        $this->command->info('🛫  ' . count($airlines) . ' airlines seeded successfully!');
    }
}
