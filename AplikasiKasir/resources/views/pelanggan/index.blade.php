@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Pelanggan</h3>

    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">Tambah Pelanggan</a>

    @if(session('message'))
    <p class="alert alert-success">{{ session('message') }}</p>
    @endif

    <table border="1">
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
                <a href="{{ route('pelanggan.show', $pelanggan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
