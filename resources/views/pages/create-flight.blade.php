@extends('layout.app')

@section('content')
    <div class="form-container">

        <div class="form-title">Create Flight ✈️</div>

        <form action="{{ route('storeFlight') }}" method="POST">
            @csrf

            <div class="form-grid">

                <div class="form-group">
                    <label class="form-label">Flight Number</label>
                    <input type="text" name="flight_number" class="form-control" value="{{ old('flight_number') }}">
                    @error('flight_number')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Airline</label>
                    <input type="text" name="airline" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Departure City</label>
                    <input type="text" name="departure_city" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Arrival City</label>
                    <input type="text" name="arrival_city" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Departure Time</label>
                    <input type="datetime-local" name="departure_time" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Arrival Time</label>
                    <input type="datetime-local" name="arrival_time" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Duration</label>
                    <input type="number" name="duration" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <label class="form-label">Seats</label>
                    <input type="number" name="seats" class="form-control">
                </div>

            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Create</button>

                <button type="reset" class="btn btn-secondary"><a href="{{ route('home') }}">Cancel</a></button>

            </div>

        </form>

    </div>
@endsection
