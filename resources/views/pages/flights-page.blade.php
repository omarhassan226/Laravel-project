@extends('layout.app')

@section('styles')
    <style>
        .flights-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .flight-card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .flight-card:hover {
            transform: translateY(-5px);
        }

        .flight-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .airline {
            font-size: 12px;
            color: gray;
        }

        .flight-body p {
            margin: 5px 0;
            font-size: 14px;
        }

        .flight-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: green;
        }

        .card-actions {
            display: flex;
            gap: 8px;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #e2e8f0;
        }
    </style>
@endsection

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1 style="margin-bottom:20px;">Available Flights ✈️</h1>
        <div>
            <a href="{{ route('home') }}" class="btn btn-primary">Back to Dashboard</a>
            <a href="{{ route('createFlight') }}" class="btn btn-primary">Create Flight</a>
        </div>
    </div>

    <div class="flights-grid">
        @forelse($flights as $flight)
            <div class="flight-card">

                <div class="flight-header">
                    <h3>{{ $flight->flight_number }}</h3>
                    <span class="airline">{{ $flight->airline }}</span>
                </div>

                <div class="flight-body">
                    <p><strong>From:</strong> {{ $flight->departure_city }}</p>
                    <p><strong>To:</strong> {{ $flight->arrival_city }}</p>

                    <p>
                        <strong>Departure:</strong>
                        {{ \Carbon\Carbon::parse($flight->departure_time)->format('d M Y - h:i A') }}
                    </p>

                    <p>
                        <strong>Arrival:</strong>
                        {{ \Carbon\Carbon::parse($flight->arrival_time)->format('d M Y - h:i A') }}
                    </p>

                    <p><strong>Duration:</strong> {{ $flight->duration }} day(s)</p>
                </div>

                <div class="flight-footer">
                    <span class="price">${{ $flight->price }}</span>
                    <span>{{ $flight->seats }} seats</span>
                </div>

                <div class="card-actions">
                    <a href="{{ route('editFlight', $flight->id) }}" class="btn-edit">
                        ✏️ Edit
                    </a>
                    <button type="button" class="btn-delete-card"
                        onclick="openDeleteModal({{ $flight->id }}, '{{ $flight->flight_number }}')">
                        🗑️ Delete
                    </button>
                </div>

            </div>
        @empty
            <p>No flights available.</p>
        @endforelse

    </div>

    {{-- Pagination --}}
    @include('partials._pagination', ['paginator' => $flights])

    {{-- Delete Confirmation Modal --}}
    @include('partials._delete-modal')

@endsection
