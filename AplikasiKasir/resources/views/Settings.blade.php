@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
</head>

<div class="container">
    <h2>Pengaturan Akun</h2>

    <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    <p><strong>Role:</strong> {{ auth()->user()->role }}</p>

    @if(auth()->user()->profile_picture)
        <img src="{{ asset('uploads/' . auth()->user()->profile_picture) }}" width="150" alt="Foto Profil">
    @else
        <p>Belum ada foto profil.</p>
    @endif

    <!-- Form Ganti Password -->
<h3>Ganti Password</h3>
<form method="POST" action="{{ route('settings.changePassword') }}" class="form-password">
    <label class="form-label">Password Lama:</label>
    <input type="password" name="current_password" class="form-input" required><br>

    <label class="form-label">Password Baru:</label>
    <input type="password" name="new_password" class="form-input" required><br>

    <label class="form-label">Konfirmasi Password Baru:</label>
    <input type="password" name="confirm_password" class="form-input" required><br>

    <button type="submit" class="btn-submit">Ganti Password</button>
</form>


    <!-- Form Upload Foto -->
    <h3>Upload Foto Profil</h3>
    <form method="POST" action="{{ route('settings.uploadProfile') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="profile_picture" required><br>
        <button type="submit" class="btn-submit">Upload</button>
    </form>
</div>
@endsection
