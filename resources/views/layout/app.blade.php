<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <style>
        body {
            margin: 0;
            font-family: Arial;
        }
    </style>
    @yield('styles')

</head>

<body>

    @include('partials.sidebar')
    @include('partials.navbar')

    <div class="global-container">
        <div id="main" class="main">
            @yield('content')
            @include('partials._toast')
        </div>
        @include('partials.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Global Toast Notifications --}}

</body>

</html>
