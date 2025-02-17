@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Pelanggan</h3>

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf

        <label>Nama:</label>
        <input type="text" name="nama_pelanggan" class="form-control" required>

        <label>Alamat:</label>
        <input type="text" name="alamat" class="form-control" required>

        <label>Telepon:</label>
        <input type="text" name="nomor_telepon" class="form-control" required>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection
