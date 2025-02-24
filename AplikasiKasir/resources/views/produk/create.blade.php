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

    h2 {
        text-align: center;
        color: #6366F1;
        margin-bottom: 20px;
    }

    .card {
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        width: 30%;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        outline: none;
    }

    input:focus {
        border-color: #6366F1;
        box-shadow: 0 0 5px rgba(99, 102, 241, 0.5);
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
    }

    .btn-primary {
        background: #6366F1;
        color: white;
    }

    .btn-primary:hover {
        background: #4f51d1;
    }

    .btn-secondary {
        background: #ddd;
        color: black;
    }

    .btn-secondary:hover {
        background: #bbb;
    }

    .text-center {
        text-align: center;
    }
</style>

<div class="container">
    <h2>Tambah Produk</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 

                <table>
                    <tr>
                        <th><label for="nama_produk">Nama Produk</label></th>
                        <td><input type="text" name="nama_produk" id="nama_produk" required></td>
                    </tr>
                    <tr>
                        <th><label for="harga">Harga</label></th>
                        <td><input type="number" name="harga" id="harga" required></td>
                    </tr>
                    <tr>
                        <th><label for="stok">Stok</label></th>
                        <td><input type="number" name="stok" id="stok" required></td>
                    </tr>
                </table>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
