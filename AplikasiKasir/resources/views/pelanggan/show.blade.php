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
        max-width: 500px;
        width: 90%;
        margin: 80px auto 20px auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: margin-left 0.3s ease-in-out, width 0.3s ease-in-out;
    }

    /* Saat sidebar terbuka */
    .sidebar-open .container {
        margin-left: 300px;
        width: calc(100% - 300px);
    }

    /* Saat sidebar tertutup */
    .sidebar-closed .container {
        margin-left: 0;
        width: 100%;
    }

    h3 {
        text-align: center;
        color: #6366F1;
        margin-bottom: 20px;
    }

    .table-container {
        border-radius: 10px;
        overflow: hidden;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #c7c6c1;
        color: black;
    }

    td {
        background-color: #f9f9f9;
    }

    .btn-back {
        display: inline-block;
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

    /* Responsif */
    @media (max-width: 1024px) {
        .sidebar-open .container {
            margin-left: 250px;
            width: calc(100% - 250px);
        }
    }

    @media (max-width: 768px) {
        .sidebar-open .container {
            margin-left: 200px;
            width: calc(100% - 200px);
        }
    }

    @media (max-width: 480px) {
        .sidebar-open .container, .sidebar-closed .container {
            margin-left: 0;
            width: 100%;
        }
    }

</style>

<div class="container">
    <h3>Detail Pelanggan</h3>

    <div class="table-container">
        <table>
            <tr><th>Nama Pelanggan</th><td>{{ $pelanggan->nama_pelanggan }}</td></tr>
            <tr><th>Alamat</th><td>{{ $pelanggan->alamat }}</td></tr>
            <tr><th>Telepon</th><td>{{ $pelanggan->nomor_telepon }}</td></tr>
        </table>
    </div>

    <a href="{{ route('pelanggan.index') }}" class="btn-back">Kembali</a>
</div>

@endsection
