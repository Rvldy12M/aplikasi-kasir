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
            <h1>SmartKasir</h1>
        </header>
        <nav>
            <ul>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('AbsenPetugas') }}">Absen Petugas</a></li>
                <li><a href="{{ route('settings') }}">Setting</a></li>
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

    <!-- JavaScript untuk Toggle Sidebar -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    const sidebar = document.querySelector(".sidebar");
    const mainContent = document.querySelector(".main-content");
    const toggleButton = document.createElement("button");
    const navbar = document.querySelector(".navbar");
    
    toggleButton.innerText = "☰";
    toggleButton.classList.add("sidebar-toggle");
    document.body.appendChild(toggleButton);
    
    toggleButton.addEventListener("click", function() {
        sidebar.classList.toggle("hidden");
        
        if (sidebar.classList.contains("hidden")) {
            toggleButton.style.left = "10px"; // Pindah tombol ke kiri
            mainContent.style.marginLeft = "0"; // Atur ulang margin konten utama
            navbar.style.marginLeft = "10"; // Tempelkan navbar dengan sidebar
        } else {
            toggleButton.style.left = "200px"; // Kembali ke posisi awal
            mainContent.style.marginLeft = "100px"; // Sesuaikan dengan sidebar
            navbar.style.marginLeft = "80px"; // Sesuaikan navbar dengan sidebar
        }
    });
});

</script>
</body>
</html>
