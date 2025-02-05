<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPenjualan;

class DetailPenjualanController extends Controller
{
    public function index()
    {
        return view('detail_penjualan.index', ['detailPenjualan' => DetailPenjualan::all()]);
    }
}
