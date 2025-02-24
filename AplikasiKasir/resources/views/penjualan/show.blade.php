@extends('layouts.app')

@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2, h3 {
        text-align: center;
        color: #6366F1;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #c7c6c1;
        color: black;
        text-align: left;
    }

    td {
        background-color: #f9f9f9;
    }

    .btn-back {
        display: block;
        text-align: center;
        background: #6366F1;
        color: white;
        padding: 10px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
        width: 100%;
        margin-top: 15px;
    }

    .btn-back:hover {
        background: #4f51c5;
    }

    p {
        font-size: 18px;
        text-align: center;
        font-weight: bold;
        margin-top: 10px;
    }
</style>

<div class="container">
    <h2>Detail Penjualan</h2>
    <a href="{{ route('penjualan.index') }}" class="btn-back">Kembali</a>

    <table>
        <tr><th>ID Penjualan</th><td>{{ $penjualan->id }}</td></tr>
        <tr><th>Tanggal</th><td>{{ $penjualan->tanggal_penjualan }}</td></tr>
        <tr><th>ID Pelanggan</th><td>{{ $penjualan->pelanggan_id }}</td></tr>
        <tr><th>Total Harga</th><td>Rp {{ number_format($penjualan->total_harga, 2) }}</td></tr>
    </table>

    <h3>Detail Produk</h3>
    @if ($penjualan->detail_penjualan && count($penjualan->detail_penjualan) > 0)
    <table>
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
</div>

@endsection
