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
        max-width: 500px;
        margin: 80px auto 20px auto;
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

    label {
        font-weight: bold;
        display: block;
        margin-top: 10px;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #6366F1;
        outline: none;
        box-shadow: 0 0 5px rgba(99, 102, 241, 0.5);
    }

    .btn-success {
        background: #28a745;
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-top: 15px;
    }

    .btn-success:hover {
        background: #218838;
    }
</style>

<div class="container">
    <h3>Tambah Pelanggan</h3>

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf

        <label>Nama:</label>
        <input type="text" name="nama_pelanggan" class="form-control" required>

        <label>Alamat:</label>
        <input type="text" name="alamat" class="form-control" required>

        <label>Telepon:</label>
        <input type="text" name="nomor_telepon" class="form-control" required>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

@endsection
