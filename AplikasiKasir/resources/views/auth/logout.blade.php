@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="text-primary">Logout</h2>
    <p>Apakah Anda yakin ingin keluar?</p>
    
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@if(session('logout_success'))
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@endif
@endsection
