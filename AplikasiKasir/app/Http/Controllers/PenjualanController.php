<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    public function index()
    {
        return view('penjualan.index', ['penjualan' => Penjualan::all()]);
    }
}
