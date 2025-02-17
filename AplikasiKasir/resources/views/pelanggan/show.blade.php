@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Pelanggan</h3>

    <table class="table table-bordered">
        <tr><th>Nama Pelanggan</th><td>{{ $pelanggan->nama_pelanggan }}</td></tr>
        <tr><th>Alamat</th><td>{{ $pelanggan->alamat }}</td></tr>
        <tr><th>Telepon</th><td>{{ $pelanggan->nomor_telepon }}</td></tr>
    </table>

    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
