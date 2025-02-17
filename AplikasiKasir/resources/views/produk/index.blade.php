@extends('layouts.app')
@section('content')

<div class="container">
    <h3 class="mb-3 text-center">Daftar Produk</h3>

    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered border-dark text-center">
            <thead class="table-dark">
                <tr>
                    <th class="border-dark">#</th>
                    <th class="border-dark">Nama Produk</th>
                    <th class="border-dark">Harga</th>
                    <th class="border-dark">Stok</th>
                    <th class="border-dark">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $index => $product)
                <tr>
                    <td class="border-dark">{{ $index + 1 }}</td>
                    <td class="border-dark">{{ $product->nama_produk }}</td>
                    <td class="border-dark">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                    <td class="border-dark">{{ $product->stok }}</td>
                    <td class="border-dark">
                        <a href="{{ route('produk.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('produk.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
