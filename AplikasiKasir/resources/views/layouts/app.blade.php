<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>SmartKasir</h1>
        </header>

        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="#">Setting</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">LogOut</button>
                    </form>
                </li>
            </ul>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
