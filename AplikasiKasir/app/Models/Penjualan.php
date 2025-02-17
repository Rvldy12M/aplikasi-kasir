<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_id', 'member_id', 'pelanggan_id', 'jumlah', 'total_harga', 'tanggal_penjualan'
    ];

    public function produk()
{
    return $this->belongsTo(Produk::class);
}

public function member()
{
    return $this->belongsTo(Member::class, 'member_id');
}

public function pelanggan()
{
    return $this->belongsTo(Member::class, 'pelanggan_id');
}

}
