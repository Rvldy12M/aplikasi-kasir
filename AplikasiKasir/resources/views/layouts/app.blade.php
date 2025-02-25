<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <header>
        <img src="{{ asset('uploads/1740360070.png') }}" alt="SmartKasir Logo" class="logo">
        <h1></h1>
        <h2 class="user-name">{{ Auth::user()->name }}</h2>
        <br>
        </header>
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('AbsenPetugas') }}">Absen Petugas</a></li>
                <li><a href="{{ route('settings') }}">Settings</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-logout">Log Out</button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Tombol Toggle Sidebar -->
    <button class="sidebar-toggle" id="toggleSidebar">☰</button>

    <!-- Navbar -->
    <nav class="navbar">
        <ul class="navbar-menu">
            <li><a href="{{ route('produk.index') }}">Produk</a></li>
            <li><a href="{{ route('penjualan.index') }}">Penjualan</a></li>
            <li><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
        </ul>
    </nav>

    <!-- Konten Utama -->
    <div class="container" id="mainContent">
        <main>
            @yield('content')
        </main>
    </div>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.querySelector("#sidebar");
    const mainContent = document.querySelector("#mainContent");
    const navbar = document.querySelector(".navbar");
    const toggleButton = document.querySelector("#toggleSidebar");

    toggleButton.addEventListener("click", function () {
        sidebar.classList.toggle("hidden");

        if (sidebar.classList.contains("hidden")) {
            // Sidebar disembunyikan
            toggleButton.style.left = "10px"; // Geser tombol ke kiri
            mainContent.style.marginLeft = "0"; // Hilangkan margin konten utama
            navbar.style.marginLeft = "0"; // Sesuaikan navbar
        } else {
            // Sidebar ditampilkan
            toggleButton.style.left = "200px"; // Geser tombol ke kanan sesuai lebar sidebar
            mainContent.style.marginLeft = "220px"; // Sesuaikan margin konten utama
            navbar.style.marginLeft = "220px"; // Sesuaikan navbar dengan sidebar
        }
    });
});
</script>

</body>
</html>
