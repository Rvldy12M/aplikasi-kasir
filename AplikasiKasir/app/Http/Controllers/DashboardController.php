<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pelanggan;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Produk::all(); 
        $pelanggans = Pelanggan::all();
        $penjualans = Penjualan::all();

        return view('dashboard', compact('products', 'pelanggans', 'penjualans'));
    }
}
