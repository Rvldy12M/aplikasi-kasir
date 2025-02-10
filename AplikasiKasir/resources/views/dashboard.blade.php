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
        <ul class="nav-links">
            <li><a href="#dashboard">Dashboard</a></li>
            <li><a href="#profile">Absen Petugas</a></li>
            <li><a href="#settings">Settings</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">LogOut</button>
                </form>
            </li>
        </ul>
    </div>

    <div id="dashboard">
        <ul class="dashboard-menu">
            <li><a href="#" onclick="showContent('produk')">Produk</a></li>
            <li><a href="#" onclick="showContent('penjualan')">Penjualan</a></li>
            <li><a href="#" onclick="showContent('transaksi')">Transaksi</a></li>
            <li><a href="#" onclick="showContent('pelanggan')">Pelanggan</a></li>
        </ul>

        <div id="produk" class="content active">
            <h3>Daftar Produk</h3>
            <table border="1">
                <tr>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->nama_produk }}</td>
                    <td>{{ $product->stok }}</td>
                    <td>Rp{{ number_format($product->harga, 0, '', '.')}}</td>
                </tr>
                @endforeach
            </table>
        </div>
</div>
</body>
</html>
