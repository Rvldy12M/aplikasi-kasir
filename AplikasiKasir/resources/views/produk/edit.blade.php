@extends('layouts.app')
@section('content')
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

        <button type="submit">Update</button>
    </form>
</div>
@endsection
