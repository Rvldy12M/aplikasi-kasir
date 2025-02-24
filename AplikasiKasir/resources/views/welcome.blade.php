<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartKasir</title>

    <style>
/* Gaya Umum */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background: url('uploads/image.png') no-repeat center center fixed;
    background-size: cover;
    color: white; /* Warna teks di seluruh halaman */
    text-align: center;
    position: relative; /* Untuk overlay */
    overflow: hidden; /* Hindari scroll */
}

/* Overlay Transparan + Blur */
body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 150%;
    background: rgba(0, 0, 0, 0.3); /* Lapisan gelap (30% opacity) */
    backdrop-filter: blur(3px); /* Efek blur di seluruh layar */

    z-index: -1; /* Letakkan di belakang konten */
}

/* Header */
header {
    background:  #1e90ff; /* Biru dengan opacity */
    color: white;
    padding: 1rem 2rem;
    box-shadow: 0 15px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative; /* Agar tidak terpengaruh blur */
    z-index: 1;
}

/* Navbar */
nav {
    display: flex;
    gap: 20px;
}

nav a {
    text-decoration: none;
    color: white;
    font-size: 18px;
    font-weight: bold;
    padding: 8px 16px;
    border: 2px solid white;
    border-radius: 8px;
    transition: background 0.3s ease;
}

nav a:hover {
    background: rgb(0, 91, 188);
}

/* Judul Utama */
h1 {
    margin: 0;
    font-size: 50px;
}

/* Kontainer Utama */
.container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 80vh; /* Isi 80% tinggi layar */
    position: relative; /* Agar tidak terkena blur */
    z-index: 1; /* Pastikan di atas overlay */
}

/* Judul Kedua */
h2 {
    font-size: 2.5rem;
    margin-bottom: 10px;
    text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.7); /* Tambahkan bayangan teks */
}

/* Paragraf */
p {
    font-size: 1.5rem;
    margin-bottom: 30px;
    text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7); /* Bayangan teks untuk kontras */
}

/* Tombol Autentikasi */
.auth-buttons a {
    display: inline-block;
    margin: 10px;
    padding: 10px 20px;
    font-size: 1rem;
    text-decoration: none;
    color: white;
    background: #42A5F5; /* Biru Sedang */
    border-radius: 8px;
    transition: background 0.3s;
}

.auth-buttons a:hover {
    background: #1E88E5; /* Biru Lebih Gelap */
}
    </style>
</head>
<body>
    <header>
        <h1>SmartKasir</h1>
        <nav>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </nav>
    </header>
    <div class="container">
        <h2>Selamat datang di SmartKasir</h2>
        <p>Manajemen kasir yang cepat dan mudah untuk bisnis Anda!</p>
    </div>
</body>
</html>
