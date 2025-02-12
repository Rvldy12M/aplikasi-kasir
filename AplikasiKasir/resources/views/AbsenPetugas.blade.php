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
                <th>Info</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>
                    <button class="btn btn-warning">Delete</button>
                    <button class="btn btn-success">Present</button>
                    <button class="btn btn-danger">Absen</button>
                </td>
                <td>
                    <form action="{{ route('absen.update', $employee->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value="present" {{ $employee->status == 'present' ? 'selected' : '' }}>Present</option>
                            <option value="absen" {{ $employee->status == 'absen' ? 'selected' : '' }}>Absen</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
