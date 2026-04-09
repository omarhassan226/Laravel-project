@extends('layout.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Dashboard</h1>
        <div>
            <a href="{{ route('allFlights') }}" class="btn btn-primary">View All Flights</a>
        </div>
    </div>

    <!-- Section 1 -->
    <div style="background:#e2e8f0; padding:20px; margin-bottom:15px;">
        <h3>Section 1</h3>
        <p>Some statistics or cards here</p>
    </div>

    <!-- Section 2 -->
    <div style="background:#cbd5f5; padding:20px; margin-bottom:15px;">
        <h3>Section 2</h3>
        <p>Charts or analytics</p>
    </div>

    <!-- Section 3 -->
    <div style="background:#bae6fd; padding:20px;">
        <h3>Section 3</h3>
        <p>Recent activity or table</p>
    </div>
@endsection
