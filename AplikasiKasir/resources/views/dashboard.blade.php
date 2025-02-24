
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
            toggleButton.style.left = "20px"; // Pindah tombol ke kiri
            mainContent.style.marginLeft = "0"; // Atur ulang margin konten utama
            navbar.style.marginLeft = "0"; // Tempelkan navbar dengan sidebar
        } else {
            toggleButton.style.left = "200px"; // Kembali ke posisi awal
            mainContent.style.marginLeft = "100px"; // Sesuaikan dengan sidebar
            navbar.style.marginLeft = "100px"; // Sesuaikan navbar dengan sidebar
        }
    });
});

</script>

</head>
<body>
<div class="sidebar">
    <h1>SmartKasir</h1>
    <h2>{{ Auth::user()->name }}</h2>
    <ul class="nav-links">
    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li><a href="{{ route('AbsenPetugas') }}">Absen Petugas</a></li>
        <li><a href="{{ route('settings') }}">Setting</a></li>
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
            <a href="{{ route('penjualan.index') }}" onclick="showContent('penjualan')">Penjualan</a>
            <a href="{{ route('pelanggan.index') }}" onclick="showContent('pelanggan')">Pelanggan</a>
        </div>
    </div>
</div>
</body>

