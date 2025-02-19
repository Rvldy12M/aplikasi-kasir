@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Detail Penjualan</title>
</head>
<body>
    <h2>Detail Penjualan</h2>
    <a href="{{ route('penjualan.index') }}">Kembali</a>
    <br><br>
    <table border="1">
        <tr>
            <th>ID Penjualan</th>
            <td>{{ $penjualan->id }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $penjualan->tanggal_penjualan }}</td>
        </tr>
        <tr>
            <th>ID Pelanggan</th>
            <td>{{ $penjualan->pelanggan_id}}</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>Rp {{ number_format($penjualan->total_harga, 2) }}</td>
        </tr>
    </table>

    <h3>Detail Produk</h3>
    @if ($penjualan->detail_penjualan && count($penjualan->detail_penjualan) > 0)
    <table border="1">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualan->detail_penjualan as $detail)
                <tr>
                    <td>{{ $detail->produk->nama_produk ?? 'Produk tidak ditemukan' }}</td>
                    <td>{{ $detail->jumlah_produk }}</td>
                    <td>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Belum ada detail produk untuk penjualan ini.</p>
@endif

    <p><strong>Total Harga:</strong> Rp{{ number_format($penjualan->total_harga ?? 0, 0, ',', '.') }}</p>
</body>
</html>
@endsection