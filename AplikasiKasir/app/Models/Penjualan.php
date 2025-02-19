<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualans'; // Nama tabel

    protected $fillable = [
        'tanggal_penjualan',
        'pelanggan_id',
        'total_harga'
    ];

    // 🔹 Relasi ke DetailPenjualan
    public function detail_penjualan()
    {
        return $this->hasMany(DetailPenjualan::class, 'penjualan_id', 'id');
    }
    

    // 🔹 Relasi ke Pelanggan (jika ada)
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id');
    }
}

