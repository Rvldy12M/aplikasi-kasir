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

<<<<<<< HEAD
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

=======
<div class="main-content">
>>>>>>> 91849f4175e2bfe4077db016380363b3386f46f1
    <div id="dashboard">
        <div class="dashboard-menu">
            <a href="#" onclick="showContent('produk')">Produk</a>
            <a href="#" onclick="showContent('penjualan')">Penjualan</a>
            <a href="#" onclick="showContent('transaksi')">Transaksi</a>
            <a href="#" onclick="showContent('pelanggan')">Pelanggan</a>
        </div>
    </div>

    <div class="content">
        <div id="produk" class="content-section active">
            <h3>Daftar Produk</h3>
            <table>
                <tr>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Harga</th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->nama_produk }}</td>
                    <td>{{ $product->stok }}</td>
<<<<<<< HEAD
                    <td>Rp{{ number_format($product->harga, 0, '', '.')}}</td>
=======
                    <td>Rp{{ number_format($product->harga, 0, '', '.') }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div id="pelanggan" class="content-section">
            <h3>Data Pelanggan</h3>
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                </tr>
                @foreach ($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $pelanggan->nama_pelanggan }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>{{ $pelanggan->nomor_telepon }}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div id="penjualan" class="content-section">
            <h3>Data Penjualan</h3>
            <table>
                <tr>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                    <th>Pelanggan</th>
                </tr>
                @foreach ($penjualans as $penjualan)
                <tr>
                    <td>{{ $penjualan->tanggal_penjualan }}</td>
                    <td>Rp{{ number_format($penjualan->total_harga, 0, '', '.') }}</td>
                    <td>{{ $penjualan->pelanggan_id }}</td>
>>>>>>> 91849f4175e2bfe4077db016380363b3386f46f1
                </tr>
                @endforeach
            </table>
        </div>
<<<<<<< HEAD
=======
    </div>
>>>>>>> 91849f4175e2bfe4077db016380363b3386f46f1
</div>
</body>
</html>
