{{-- Partial Flight Form - Used by both Create and Edit pages --}}
{{-- Variables: $airlines, $cities, $flight (optional - null for create) --}}

@php
    $isEdit = isset($flight) && $flight;
@endphp

<div class="form-grid">

    <div class="form-group">
        <label class="form-label">Flight Number</label>
        <input type="text" name="flight_number" class="form-control"
               value="{{ old('flight_number', $isEdit ? $flight->flight_number : '') }}">
        @error('flight_number')
            <span class="form-error">{{ $message }}</span>
        @enderror.
    </div>

    <div class="form-group">
        <label class="form-label">Airline</label>
        <select name="airline" class="form-control">
            <option value="" disabled {{ !$isEdit && !old('airline') ? 'selected' : '' }}>-- Select Airline --</option>
            @foreach($airlines as $airline)
                <option value="{{ $airline->name }}"
                    {{ old('airline', $isEdit ? $flight->airline : '') == $airline->name ? 'selected' : '' }}>
                    {{ $airline->code }} - {{ $airline->name }}
                </option>
            @endforeach
        </select>
        @error('airline')
            <span class="form-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Departure City</label>
        <select name="departure_city" class="form-control">
            <option value="" disabled {{ !$isEdit && !old('departure_city') ? 'selected' : '' }}>-- Select City --</option>
            @foreach($cities as $city)
                <option value="{{ $city->name }}"
                    {{ old('departure_city', $isEdit ? $flight->departure_city : '') == $city->name ? 'selected' : '' }}>
                    {{ $city->name }}, {{ $city->country }}
                </option>
            @endforeach
        </select>
        @error('departure_city')
            <span class="form-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Arrival City</label>
        <select name="arrival_city" class="form-control">
            <option value="" disabled {{ !$isEdit && !old('arrival_city') ? 'selected' : '' }}>-- Select City --</option>
            @foreach($cities as $city)
                <option value="{{ $city->name }}"
                    {{ old('arrival_city', $isEdit ? $flight->arrival_city : '') == $city->name ? 'selected' : '' }}>
                    {{ $city->name }}, {{ $city->country }}
                </option>
            @endforeach
        </select>
        @error('arrival_city')
            <span class="form-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Departure Time</label>
        <input type="datetime-local" name="departure_time" id="departure_time" class="form-control"
               value="{{ old('departure_time', $isEdit ? \Carbon\Carbon::parse($flight->departure_time)->format('Y-m-d\TH:i') : '') }}">
        @error('departure_time')
            <span class="form-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Arrival Time</label>
        <input type="datetime-local" name="arrival_time" id="arrival_time" class="form-control"
               value="{{ old('arrival_time', $isEdit ? \Carbon\Carbon::parse($flight->arrival_time)->format('Y-m-d\TH:i') : '') }}">
        @error('arrival_time')
            <span class="form-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Duration (Days)</label>
        <input type="number" name="duration" id="duration" class="form-control" readonly
               value="{{ old('duration', $isEdit ? $flight->duration : '') }}">
    </div>

    <div class="form-group">
        <label class="form-label">Price</label>
        <input type="number" name="price" class="form-control"
               value="{{ old('price', $isEdit ? $flight->price : '') }}">
        @error('price')
            <span class="form-error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Seats</label>
        <input type="number" name="seats" class="form-control"
               value="{{ old('seats', $isEdit ? $flight->seats : '') }}">
        @error('seats')
            <span class="form-error">{{ $message }}</span>
        @enderror
    </div>

</div>
