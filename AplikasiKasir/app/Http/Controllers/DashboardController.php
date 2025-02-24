<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSales = Penjualan::sum('total_harga'); // Sesuai dengan field di database
        $totalOrders = Penjualan::count();
        $totalProducts = Produk::count();
        
        return view('dashboard', compact('totalSales', 'totalOrders', 'totalProducts'));
    }
}
