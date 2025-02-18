@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Penjualan</h1>
    
    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf

        <!-- Tanggal Penjualan -->
        <label for="tanggal">Tanggal Penjualan:</label>
        <input type="date" name="tanggal" id="tanggal" required value="{{ date('Y-m-d') }}"><br><br>

        <label for="member_id">Pilih Member:</label>
        <select name="member_id" id="member_id">
            <option value="">Tidak ada</option>
            @foreach ($members as $member)
                <option value="{{ $member->id }}">{{ $member->nama }}</option>
            @endforeach
        </select><br><br>

        <!-- Produk (Bisa Menambah Banyak Produk) -->
        <div id="produk-container">
            <div class="produk-item">
                <label for="produk_id">Produk:</label>
                <select name="produk_id[]" class="produk-select" required>
                    @foreach ($produk as $prod)
                        <option value="{{ $prod->id }}" data-harga="{{ $prod->harga }}">{{ $prod->nama_produk }}</option>
                    @endforeach
                </select>
                
                <label>Jumlah:</label>
                <input type="number" name="jumlah[]" class="jumlah-input" min="1" value="1" required>
            </div>
        </div>

        <button type="button" id="tambah-produk">Tambah Produk</button><br><br>

        <!-- Total Harga -->
        <label for="total_harga">Total Harga:</label>
        <input type="text" id="total_harga" name="total_harga" readonly><br><br>

        <button type="submit">Simpan</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const produkContainer = document.getElementById("produk-container");
        const tambahProdukBtn = document.getElementById("tambah-produk");
        const totalHargaInput = document.getElementById("total_harga");

        function hitungTotalHarga() {
            let total = 0;
            document.querySelectorAll(".produk-item").forEach(item => {
                const harga = item.querySelector(".produk-select").selectedOptions[0].dataset.harga;
                const jumlah = item.querySelector(".jumlah-input").value;
                total += harga * jumlah;
            });
            totalHargaInput.value = total.toLocaleString("id-ID", { minimumFractionDigits: 2 });
        }

        tambahProdukBtn.addEventListener("click", function () {
            const itemBaru = document.querySelector(".produk-item").cloneNode(true);
            itemBaru.querySelector(".jumlah-input").value = "1";
            produkContainer.appendChild(itemBaru);
        });

        produkContainer.addEventListener("click", function (e) {
            if (e.target.classList.contains("hapus-produk")) {
                e.target.parentElement.remove();
                hitungTotalHarga();
            }
        });

        produkContainer.addEventListener("input", function (e) {
            if (e.target.classList.contains("jumlah-input") || e.target.classList.contains("produk-select")) {
                hitungTotalHarga();
            }
        });

        hitungTotalHarga();
    });
</script>
@endsection
