<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Pakai model yang benar

class DashboardController extends Controller
{
    public function index()
    {
        $products = Produk::all(); // Ambil semua data produk
        return view('dashboard', compact('products')); // Kirim data ke view
        $pelanggans = Pelanggan::all(); // Ambil semua data produk
        return view('dashboard', compact('pelanggans')); // Kirim data ke view
    }
}
