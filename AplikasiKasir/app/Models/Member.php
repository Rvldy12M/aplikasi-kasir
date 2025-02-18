<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members'; // Sesuaikan dengan nama tabel

    protected $fillable = ['nama', 'nomor_telepon', 'alamat', 'tanggal_daftar']; // Sesuaikan dengan kolom di tabel
}
