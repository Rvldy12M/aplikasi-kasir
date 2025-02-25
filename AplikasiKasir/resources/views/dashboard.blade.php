@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<div class="container">
    
<div class="dashboard-header">
</div>


    <div class="dashboard-tables">
        <table class="dashboard-table">
            <thead>
                <tr>
                    <th>Total Penjualan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Rp {{ number_format($totalSales, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <table class="dashboard-table">
            <thead>
                <tr>
                    <th>Total Orders</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $totalOrders }}</td>
                </tr>
            </tbody>
        </table>

        <table class="dashboard-table">
            <thead>
                <tr>
                    <th>Total Produk</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $totalProducts }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
