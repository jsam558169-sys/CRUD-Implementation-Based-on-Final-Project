<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        /* Navbar */
        .navbar {
            background: #333;
            padding: 10px;
            display: flex;
            gap: 10px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
        }

        .navbar a.active {
            background: #4CAF50;
            border-radius: 5px;
        }

        .navbar a:hover {
            background: #555;
        }

        /* Content */
        .container {
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <a href="{{ route('home') }}"
            class="{{ request()->routeIs('home') ? 'active' : '' }}">
            Home</a>

        <a href="{{ route('student.application.create') }}"
            class="{{ request()->routeIs('student.application.create') ? 'active' : '' }}">
            Add Record
        </a>

        <a href="{{ route('applications.index') }}"
            class="{{ request()->routeIs('applications.index') ? 'active' : '' }}">
            View Records
        </a>
    </div>

    <div class="container">
        @yield('content')
    </div>

</body>

</html>