<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<div class="sidebar">
    <h1>SmartKasir</h1>
    <h2>{{ Auth::user()->name }}</h2>
    <ul class="nav-links">
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li><a href="{{ route('AbsenPetugas') }}">Absen Petugas</a></li>
        <li><a href="{{ route('settings') }}">Settings</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">LogOut</button>
            </form>
        </li>
    </ul>
</div>

<div class="main-content">
    <div id="dashboard">
        <div class="dashboard-menu">
            <a href="{{ route('produk.index') }}">Produk</a>
            <a href="#" onclick="showContent('penjualan')">Penjualan</a>
            <a href="{{ route('pelanggan.index') }}" onclick="showContent('pelanggan')">Pelanggan</a>
        </div>
    </div>
</div>
</body>
</html>
