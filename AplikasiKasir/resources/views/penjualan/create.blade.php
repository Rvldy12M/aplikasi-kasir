@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Penjualan</title>
    <script>
        let produkData = @json($produk);

        function tambahProduk() {
            let produkList = document.getElementById('produk-list');
            let produkItem = document.createElement('div');
            produkItem.classList.add('produk-item');

            produkItem.innerHTML = `
                <select name="produk_id[]" class="produk-select" onchange="hitungTotal()" required>
                    <option value="">-- Pilih Produk --</option>
                    @foreach($produk as $p)
                        <option value="{{ $p->id }}" data-harga="{{ $p->harga }}">{{ $p->nama_produk }}</option>
                    @endforeach
                </select>
                <input type="number" name="jumlah[]" class="jumlah-input" placeholder="Jumlah" min="1" required oninput="hitungTotal()">
                <button type="button" onclick="this.parentNode.remove(); hitungTotal()">Hapus</button>
            `;

            produkList.appendChild(produkItem);
        }

        function hitungTotal() {
            let totalHarga = 0;
            let produkSelects = document.querySelectorAll('.produk-select');
            let jumlahInputs = document.querySelectorAll('.jumlah-input');

            produkSelects.forEach((select, index) => {
                let harga = select.options[select.selectedIndex].getAttribute('data-harga') || 0;
                let jumlah = jumlahInputs[index].value || 0;
                totalHarga += parseInt(harga) * parseInt(jumlah);
            });

            document.getElementById('total-harga').innerText = `Total Harga: Rp${totalHarga.toLocaleString('id-ID')}`;
        }
    </script>
</head>
<body>
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
            </div>
        </div>

        <button type="button" onclick="tambahProduk()">Tambah Produk</button>
        <h3 id="total-harga">Total Harga: Rp0</h3>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
@endsection
