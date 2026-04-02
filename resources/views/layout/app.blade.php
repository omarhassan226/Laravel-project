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

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            background: #1e293b;
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            transition: 0.3s;
            overflow-y: auto;
        }

        .sidebar.closed {
            left: -250px;
        }

        /* NAVBAR */
        .navbar {
            position: fixed;
            left: 250px;
            top: 0;
            right: 0;
            height: 60px;
            background: #0f172a;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            transition: 0.3s;
            z-index: 9999;
        }

        .navbar.full {
            left: 0;
        }

        .footer {
            background: #0f172a;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px 20px;
            transition: 0.3s;
            margin-left: 250px;
            width: calc(100% - 250px);
            box-sizing: border-box;
        }

        .footer.full {
            margin-left: 0;
            width: 100%;
        }

        /* CONTENT */
        .main {
            margin-left: 250px;
            margin-top: 60px;
            padding: 20px;
            transition: 0.3s;
        }

        .main.full {
            margin-left: 0;
        }

        /* COLLAPSE */
        .submenu {
            display: none;
            padding-left: 15px;
        }

        .submenu.open {
            display: block;
        }

        /* RESPONSIVE */
        @media(max-width: 768px) {
            .sidebar {
                left: -250px;
            }

            .navbar {
                left: 0;
            }


            .footer {
                margin-left: 0;
                width: 100%;
            }

            .main {
                margin-left: 0;
            }
        }

        .global-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            justify-content: space-between;
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
        </div>
        @include('partials.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
