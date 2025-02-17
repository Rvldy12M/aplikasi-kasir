@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Pelanggan</h3>

    <a href="{{ route('pelanggan.create') }}" class="btn btn_primary">Tambah Pelanggan</a>

    @if(session('message'))
    <p class="alert alert-success">{{ session('message') }}</p>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Aksi</th>
        </tr>

        @foreach ($pelanggans as $pelanggan)
        <tr>
            <td>{{ $pelanggan->id }}</td>
            <td>{{ $pelanggan->nama_pelanggan }}</td>
            <td>{{ $pelanggan->alamat }}</td>
            <td>{{ $pelanggan->nomor_telepon }}</td>
            <td>
            <a href="{{ route('pelanggan.show', $p->id) }}" class="btn btn-info btn-sm">Lihat</a>
            <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
</table>
</div>
@endsection