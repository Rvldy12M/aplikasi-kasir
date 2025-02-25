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
        max-width: 900px;
        margin: 20px auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #004aad;
        margin-bottom: 20px;
    }

    .btn {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background: #004aad;
        color: white;
    }

    .btn-primary:hover {
        background: #00307a;
    }

    .btn-danger {
        background: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background: #b52a37;
    }

    .btn-container {
        display: flex;
        gap: 5px;
        justify-content: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 12px;
        text-align: center;
        border: 1px solid #ddd;
    }

    th {
        background: #004aad;
        color: white;
    }

    tr:nth-child(even) {
        background: #e3f2fd;
    }

    tr:hover {
        background: #bbdefb;
    }

    form {
        display: inline-block;
        margin: 0;
    }

    .alert {
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        text-align: center;
    }
</style>

<div class="container">
    <h2>Daftar Produk</h2>

    <!-- Tombol Tambah Produk -->
    @if(Auth::user()->role === 'admin')
        <div style="text-align: right; margin-bottom: 10px;">
            <a href="{{ route('produk.create') }}" class="btn btn-primary">+ Tambah Produk</a>
        </div>
    @endif

    <!-- Notifikasi pesan sukses -->
    @if(session('message'))
        <div class="alert">{{ session('message') }}</div>
    @endif

    <!-- Tabel Produk -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $index => $product)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $product->nama_produk }}</td>
                <td>Rp{{ number_format($product->harga, 0, ',', '.') }}</td>
                <td>{{ $product->stok }}</td>
                <td class="btn-container">
                    <a href="{{ route('produk.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    @if(Auth::user()->role === 'admin')
                    <form action="{{ route('produk.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin hapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
