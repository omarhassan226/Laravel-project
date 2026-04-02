<div>
    {{-- @if --}}
    {{-- @if (count($users) > 0)

        @foreach ($users as $user)
            <div>
                <h2>{{ $user['name'] }}</h2>
                <p>{{ $user['email'] }}</p>
            </div>
        @endforeach
    @endif --}}

    {{-- @isset --}}
    @isset($users)
        @foreach ($users as $user)
            <div>
                <h2>{{ $user['name'] }}</h2>
                <p>{{ $user['email'] }}</p>
            </div>
        @endforeach
    @endisset

</div>
