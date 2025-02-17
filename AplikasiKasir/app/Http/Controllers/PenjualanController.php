<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Member;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
{
    $penjualans = Penjualan::all(); // Pastikan ini mengembalikan semua data penjualan
    return view('penjualan.index', compact('penjualans')); // Pastikan penjualans dikirim ke view
}

public function show($id)
{
    $penjualan = Penjualan::findOrFail($id); // Cek jika ID valid
    return view('penjualan.show', compact('penjualan')); // Pastikan view show sudah siap
}


    public function create()
    {
        $produk = Produk::all();
        $members = Member::all();
        return view('penjualan.create', compact('produk', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'member_id' => 'nullable|exists:members,id',
            'pelanggan_id' => 'nullable|exists:members,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_penjualan' => 'required|date', // Validasi tanggal
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $harga = $produk->harga;

        // Cek jika ada diskon untuk member
        if ($request->member_id) {
            $member = Member::findOrFail($request->member_id);
            $harga = $produk->harga - ($produk->harga * 0.10); // 10% diskon
        }

        // Jika pelanggan_id diisi, maka penjualan ini untuk pelanggan umum atau member
        if ($request->pelanggan_id) {
            $harga = $produk->harga; // Tidak ada diskon untuk pelanggan umum
        }

        Penjualan::create([
            'produk_id' => $request->produk_id,
            'member_id' => $request->member_id,
            'pelanggan_id' => $request->pelanggan_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $harga * $request->jumlah,
            'tanggal_penjualan' => $request->tanggal_penjualan, // Simpan tanggal penjualan
        ]);

        return redirect()->route('penjualan.index')->with('message', 'Penjualan berhasil dibuat!');
    }
}
