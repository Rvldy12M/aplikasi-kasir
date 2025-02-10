<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>SmartKasir</h1>

    <div>
        <h2>{{ Auth::user()->name }}</h2> 
    </div>

    <div>
        <ul>
            <li><a href="#dashboard">Dashboard</a></li>
            <li><a href="#profile">Profile Petugas</a></li>
            <li><a href="#setting">Settings</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">LogOut</button>
                </form>
            </li>
        </ul>
    </div>
</body>
</html>
