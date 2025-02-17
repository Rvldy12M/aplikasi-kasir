@extends("layouts.app")

@section('content')
<div class="container">
    <h2>Detail Produk</h2>

    <p><strong>Nama Produk:</strong> {{ $produk->nama_produk}}</p>
    <p><strong>Harga:</strong> {{ number_format($produk->harga, 0, ',', '.') }}</p>
    <p><strong>Stok:</strong> {{ $produk->stok}}</p>
    <br>
    <a href="{{ route('produk.index') }}">Kembali</a>
</div>
@endsection