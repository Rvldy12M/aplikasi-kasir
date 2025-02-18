<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartKasir</title>
</head>
<body>
    <header>
        <h1>SmartKasir</h1>
    </header>
    <div class="container">
        <h2>Selamat datang di SmartKasir</h2>
        <p>Manajemen kasir yang cepat dan mudah untuk bisnis Anda!</p>
        <div class="auth-buttons">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</body>
</html>
