@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Penjualan</title>
</head>
<body>
    <h2>Daftar Penjualan</h2>
    <a href="{{ route('penjualan.create') }}">Tambah Penjualan</a>
    <table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Penjualan</th>
            <th>Pelanggan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($penjualans as $penjualan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $penjualan->tanggal_penjualan }}</td>
            <td>{{ $penjualan->pelanggan ? $penjualan->pelanggan->nama_pelanggan : 'Tidak Diketahui' }}</td>
            <td>Rp{{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('penjualan.show', $penjualan->id) }}">Detail</a>
                <form action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
@endsection

