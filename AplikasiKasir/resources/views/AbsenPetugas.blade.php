@extends('layouts.app')

@section('title', 'Absen Petugas')

@section('content')
<div class="container">
    <h2 class="text-primary">Employee Absence</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                @if(auth()->user()->role == 'petugas')
                    <th>Info</th> {{-- Hanya petugas yang bisa memilih absen --}}
                @endif
                <th>Detail</th>
                @if(auth()->user()->role == 'admin')
                    <th>Action</th> {{-- Hanya admin yang bisa menghapus --}}
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                
                {{-- Hanya petugas yang bisa memilih Present/Absen --}}
                @if(auth()->user()->role == 'petugas')
                <td>
                    <form action="{{ route('absen.update', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" name="status" value="present" class="btn btn-success" {{ $employee->status == 'present' ? 'disabled' : '' }}>Present</button>
                        <button type="submit" name="status" value="absen" class="btn btn-danger" {{ $employee->status == 'absen' ? 'disabled' : '' }}>Absen</button>
                    </form>
                </td>
                @endif

                {{-- Semua user (Admin & Petugas) bisa melihat Detail --}}
                <td>
                    @if($employee->status == 'present')
                        <button class="btn btn-success">Present</button>
                    @else
                        <button class="btn btn-danger">Absen</button>
                    @endif
                </td>

                {{-- Admin bisa menghapus data --}}
                @if(auth()->user()->role == 'admin')
                <td>
                    <form action="{{ route('absen.delete', $employee->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-warning">Delete</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
