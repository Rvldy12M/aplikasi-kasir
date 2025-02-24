@extends('layouts.app')

@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        transition: margin-left 0.3s ease-in-out;
    }

    .container {
        width: 80%;
        max-width: 800px;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: all 0.3s ease-in-out;
    }

    h3 {
        text-align: center;
        color: #6366F1;
        margin-bottom: 20px;
    }

    .btn {
        display: inline-block;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
        border: none;
        cursor: pointer;
        text-align: center;
    }

    .btn-primary {
        background: #6366F1;
        color: white;
    }

    .btn-primary:hover {
        background: #4f51d1;
    }

    .btn-info {
        background: #17a2b8;
        color: white;
    }

    .btn-info:hover {
        background: #138496;
    }

    .btn-warning {
        background: #ffc107;
        color: white;
    }

    .btn-warning:hover {
        background: #e0a800;
    }

    .btn-danger {
        background: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background: #c82333;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        margin-bottom: 15px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: center;
    }

    th {
        background: #6366F1;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    td .btn-container {
        display: flex;
        gap: 5px;
        justify-content: center;
        align-items: center;
    }

    @media (max-width: 1024px) {
        .container {
            width: 90%;
        }
    }

    @media (max-width: 768px) {
        .container {
            width: 95%;
        }
    }

    @media (max-width: 480px) {
        .container {
            width: 100%;
            padding: 15px;
        }
    }
</style>

<div class="container">
    <h3>Daftar Pelanggan</h3>

    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan</a>

    @if(session('message'))
    <p class="alert alert-success">{{ session('message') }}</p>
    @endif

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Aksi</th>
        </tr>

        @foreach ($pelanggans as $pelanggan)
        <tr>
            <td>{{ $pelanggan->id }}</td>
            <td>{{ $pelanggan->nama_pelanggan }}</td>
            <td>{{ $pelanggan->alamat }}</td>
            <td>{{ $pelanggan->nomor_telepon }}</td>
            <td>
                <div class="btn-container">
                    <a href="{{ route('pelanggan.show', $pelanggan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection
