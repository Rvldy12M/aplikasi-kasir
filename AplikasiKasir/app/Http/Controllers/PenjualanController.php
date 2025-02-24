<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\DetailPenjualan;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('pelanggan')->get();
        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all();
        $produk = Produk::all();

        return view('penjualan.create', compact('pelanggan', 'produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'pelanggan_id' => 'nullable|exists:pelanggans,id',
            'produk_id' => 'required|array',
            'jumlah' => 'required|array',
            'produk_id.*' => 'exists:produks,id',
            'jumlah.*' => 'integer|min:1',
        ]);
    
        // Gunakan NULL jika pelanggan tidak dipilih
        $pelangganId = $request->pelanggan_id ?? null;
    
        // Simpan data penjualan utama
        $penjualan = Penjualan::create([
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'total_harga' => 0, // Akan dihitung nanti
            'pelanggan_id' => $pelangganId,
        ]);
    
        // Simpan detail penjualan
        $totalHarga = 0;
        foreach ($request->produk_id as $key => $produkId) {
            $produk = Produk::findOrFail($produkId);
            $jumlah = $request->jumlah[$key]; // Ambil jumlah sesuai index
            $subtotal = $produk->harga * $jumlah;
            $totalHarga += $subtotal;
    
            DetailPenjualan::create([
                'penjualan_id' => $penjualan->id,
                'produk_id' => $produkId, 
                'jumlah_produk' => $jumlah, // Ambil jumlah sesuai index
                'subtotal' => $subtotal, 
            ]);
        }
    
        // Update total harga di tabel penjualan
        $penjualan->update(['total_harga' => $totalHarga]);
    
        return redirect()->route('penjualan.index')->with('message', 'Penjualan berhasil ditambahkan!');
    }
    public function destroy($id)
    {
        Penjualan::destroy($id);
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus');
    }

    public function show($id)
    {
        $penjualan = Penjualan::with('detail_penjualan.produk')->find($id);
    
        if (!$penjualan) {
            return redirect()->route('penjualan.index')->with('error', 'Data penjualan tidak ditemukan.');
        }
    
        return view('penjualan.show', compact('penjualan'));
    }
    

}
