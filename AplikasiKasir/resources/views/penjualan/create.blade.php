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

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    input, select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        outline: none;
    }

    input:focus, select:focus {
        border-color: #6366F1;
        box-shadow: 0 0 5px rgba(99, 102, 241, 0.5);
    }

    .produk-item {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .produk-item select, .produk-item input {
        flex: 1;
    }

    .produk-item button {
        background: #ff4d4d;
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
    }

    .produk-item button:hover {
        background: #d43f3f;
    }

    #total-harga {
        text-align: center;
        font-size: 18px;
        font-weight: bold;
        color: #333;
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
    <h2>Tambah Penjualan</h2>

    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf

        <label for="tanggal_penjualan">Tanggal Penjualan:</label>
        <input type="date" name="tanggal_penjualan" required>

        <label for="pelanggan">Pelanggan:</label>
        <select name="pelanggan_id">
            <option value="">-- Tidak Diketahui --</option>
            @foreach($pelanggan as $p)
                <option value="{{ $p->id }}">{{ $p->nama_pelanggan }}</option>
            @endforeach
        </select>

        <label for="produk">Produk:</label>
        <div id="produk-list">
            <div class="produk-item">
                <select name="produk_id[]" class="produk-select" onchange="hitungTotal()" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach($produk as $p)
                        <option value="{{ $p->id }}" data-harga="{{ $p->harga }}">{{ $p->nama_produk }}</option>
                    @endforeach
                </select>
                <input type="number" name="jumlah[]" class="jumlah-input" placeholder="Jumlah" required min="1" oninput="hitungTotal()">
                <button type="button" onclick="this.parentNode.remove(); hitungTotal()">Hapus</button>
            </div>
        </div>

        <button type="button" class="btn btn-secondary" onclick="tambahProduk()">Tambah Produk</button>
        <h3 id="total-harga">Total Harga: Rp0</h3>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection
