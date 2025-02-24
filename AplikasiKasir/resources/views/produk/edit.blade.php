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

    label {
        font-weight: bold;
        display: block;
        margin-top: 10px;
        color: #333;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: 0.3s;
    }

    input:focus {
        border-color: #6366F1;
        outline: none;
        box-shadow: 0 0 5px rgba(99, 102, 241, 0.5);
    }

    .btn-submit {
        background: #6366F1;
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

    .btn-submit:hover {
        background: #4f51c5;
    }
</style>

<div class="container">
    <h2>Edit Produk</h2>
    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Produk:</label>
        <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" required>

        <label>Harga:</label>
        <input type="number" name="harga" value="{{ $produk->harga }}" required>

        <label>Stok:</label>
        <input type="number" name="stok" value="{{ $produk->stok }}" required>

        <button type="submit" class="btn-submit">Update</button>
    </form>
</div>

@endsection
