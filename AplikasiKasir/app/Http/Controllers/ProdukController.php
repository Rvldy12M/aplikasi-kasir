<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $products = Produk::all(); // Ambil semua produk dari database
        return view('dashboard', compact('products'));
    }
}