<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();                     // 1
            $table->string('flight_number'); // 2
            $table->string('airline');       // 3
            $table->string('departure_city'); // 4
            $table->string('arrival_city');   // 5
            $table->dateTime('departure_time'); // 6
            $table->dateTime('arrival_time');   // 7
            $table->integer('duration');     // 8 (minutes)
            $table->decimal('price', 8, 2);  // 9
            $table->integer('seats');        // 10
            $table->timestamps();            // extra (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
