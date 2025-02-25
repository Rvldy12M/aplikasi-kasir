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
        margin: 80px auto 20px auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #004aad;
    }

    label {
        font-weight: bold;
        color: #004aad;
        display: block;
        margin-top: 10px;
    }

    select, input {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    .produk-item {
        display: flex;
        gap: 10px;
        align-items: center;
        margin-top: 10px;
    }

    button {
        padding: 8px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-secondary {
        background: #007bff;
        color: white;
    }

    .btn-secondary:hover {
        background: #0056b3;
    }

    .btn-danger {
        background: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background: #b02a37;
    }

    #total-harga {
        text-align: center;
        margin-top: 15px;
        font-weight: bold;
        color: #004aad;
    }
</style>

<div class="container">
    <h2> Tambah Penjualan</h2>

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
                        <option value="{{ $p->id }}" data-harga="{{ $p->harga }}">{{ $p->nama_produk }} - Rp{{ number_format($p->harga, 0, ',', '.') }}</option>
                    @endforeach
                </select>
                <input type="number" name="jumlah[]" class="jumlah-input" placeholder="Jumlah" required min="1" oninput="hitungTotal()">
                <button type="button" class="btn btn-danger" onclick="hapusProduk(this)">Hapus</button>
            </div>
        </div>

        <button type="button" class="btn btn-secondary" onclick="tambahProduk()">Tambah Produk</button>
        <h3 id="total-harga">Total Harga: Rp0</h3>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    function tambahProduk() {
        let produkList = document.getElementById('produk-list');
        let produkItem = document.createElement('div');
        produkItem.classList.add('produk-item');

        produkItem.innerHTML = `
            <select name="produk_id[]" class="produk-select" onchange="hitungTotal()" required>
                <option value="">-- Pilih Produk --</option>
                @foreach($produk as $p)
                    <option value="{{ $p->id }}" data-harga="{{ $p->harga }}">{{ $p->nama_produk }} - Rp{{ number_format($p->harga, 0, ',', '.') }}</option>
                @endforeach
            </select>
            <input type="number" name="jumlah[]" class="jumlah-input" placeholder="Jumlah" required min="1" oninput="hitungTotal()">
            <button type="button" class="btn btn-danger" onclick="hapusProduk(this)">Hapus</button>
        `;

        produkList.appendChild(produkItem);
    }

    function hapusProduk(element) {
        element.parentNode.remove();
        hitungTotal();
    }

    function hitungTotal() {
        let totalHarga = 0;
        let produkSelects = document.querySelectorAll('.produk-select');
        let jumlahInputs = document.querySelectorAll('.jumlah-input');

        produkSelects.forEach((select, index) => {
            let harga = select.options[select.selectedIndex].dataset.harga || 0;
            let jumlah = jumlahInputs[index].value || 0;
            totalHarga += parseInt(harga) * parseInt(jumlah);
        });

        document.getElementById('total-harga').innerText = "Total Harga: Rp" + totalHarga.toLocaleString('id-ID');
    }
</script>

@endsection
