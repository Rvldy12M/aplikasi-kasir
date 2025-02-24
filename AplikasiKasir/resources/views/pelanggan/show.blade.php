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
        max-width: 600px;
        margin: 20px auto;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h3 {
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
</style>

<div class="container">
    <h3>Detail Pelanggan</h3>

    <table>
        <tr><th>Nama Pelanggan</th><td>{{ $pelanggan->nama_pelanggan }}</td></tr>
        <tr><th>Alamat</th><td>{{ $pelanggan->alamat }}</td></tr>
        <tr><th>Telepon</th><td>{{ $pelanggan->nomor_telepon }}</td></tr>
    </table>

    <a href="{{ route('pelanggan.index') }}" class="btn-back">Kembali</a>
</div>

@endsection
