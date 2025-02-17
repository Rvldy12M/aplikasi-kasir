@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Pelanggan</h3>

    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama:</label>
        <input type="text" name="nama" class="form-control" value="{{ $pelanggan->nama_pelanggan }}" required>

        <label>Alamat:</label>
        <input type="text" name="text" class="form-control" value="{{ $pelanggan->alamat }}" required>

        <label>Telepon:</label>
        <input type="text" name="telepon" class="form-control" value="{{ $pelanggan->nomor_telepon }}" required>

        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
