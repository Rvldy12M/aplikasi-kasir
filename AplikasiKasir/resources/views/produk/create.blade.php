@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center mb-4">Tambah Produk</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                
                <table class="table table-bordered">
                    <tr>
                        <th><label for="nama_produk">Nama Produk</label></th>
                        <td><input type="text" name="nama_produk" id="nama_produk" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th><label for="harga">Harga</label></th>
                        <td><input type="number" name="harga" id="harga" class="form-control" required></td>
                    </tr>
                    <tr>
                        <th><label for="stok">Stok</label></th>
                        <td><input type="number" name="stok" id="stok" class="form-control" required></td>
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
