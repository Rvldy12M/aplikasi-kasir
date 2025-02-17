@extends('layouts.app')

@section('content')
    <h1>Daftar Penjualan</h1>

    @if(session('message'))
        <div>{{ session('message') }}</div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal Penjualan</th>
                <th>Pelanggan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualans as $penjualan)
                <tr>
                    <td>{{ $penjualan->produk->nama_produk }}</td>
                    <td>{{ $penjualan->jumlah }}</td>
                    <td>{{ $penjualan->total_harga }}</td>
                    <td>{{ $penjualan->tanggal_penjualan }}</td>
                    <td>{{ $penjualan->pelanggan ? $penjualan->pelanggan->nama : 'Pelanggan Umum' }}</td>
                    <td><a href="{{ route('penjualan.show', $penjualan->id) }}">Lihat Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <a href="{{ route('penjualan.create') }}">Tambah Penjualan</a>
@endsection
