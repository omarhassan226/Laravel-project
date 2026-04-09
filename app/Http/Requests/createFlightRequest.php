<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class createFlightRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'flight_number' => 'required|string|max:255',
            'airline' => 'required|string|max:255',
            'departure_city' => 'required|string|max:255',
            'arrival_city' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'seats' => 'required|integer|min:1'
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'arrival_time.after' => 'Arrival time must be after departure time.',
    //         'duration.min' => 'Duration must be at least 1 minute.',
    //         'price.min' => 'Price cannot be negative.',
    //     ];
    // }
}