@extends('layout.app')

@section('content')
    <div class="form-container">

        <div class="form-title">Edit Flight ✏️</div>

        <form action="{{ route('updateFlight', $flight->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('partials._flight-form', ['flight' => $flight])

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary"><a href="{{ route('allFlights') }}">Cancel</a></button>
            </div>

        </form>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const departureInput = document.getElementById('departure_time');
            const arrivalInput = document.getElementById('arrival_time');
            const durationInput = document.getElementById('duration');

            // Calculate duration using fetch API
            function calculateDuration() {
                const departureTime = departureInput.value;
                const arrivalTime = arrivalInput.value;

                // Only calculate when both fields are filled
                if (!departureTime || !arrivalTime) return;

                fetch("{{ route('calculateDuration') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        departure_time: departureTime,
                        arrival_time: arrivalTime
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.duration) {
                        // Convert seconds to days
                        durationInput.value = Math.round(data.duration / (60*60*24));
                    }
                })
                .catch(error => {
                    console.error('Error calculating duration:', error);
                    durationInput.value = '';
                });
            }

            departureInput.addEventListener('change', calculateDuration);
            arrivalInput.addEventListener('change', calculateDuration);
        });
    </script>
@endsection
