@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Pelanggan</h3>

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf

        <label>Nama:</label>
        <input type="text" name="nama" class="form-control" required>

        <label>Email:</label>
        <input type="email" name="email" class="form-control" required>

        <label>Telepon:</label>
        <input type="text" name="telepon" class="form-control" required>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
</div>
@endsection
