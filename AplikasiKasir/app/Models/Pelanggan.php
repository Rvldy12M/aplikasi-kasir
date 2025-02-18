<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans'; // Sesuaikan dengan nama tabel di database

    protected $fillable = ['nama_pelanggan', 'alamat', 'nomor_telepon']; // Pastikan ini sesuai dengan kolom di tabel
}
