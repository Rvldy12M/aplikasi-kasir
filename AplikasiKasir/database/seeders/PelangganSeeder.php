<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan data dummy untuk pelanggan
        Pelanggan::create([
            'nama' => 'Andi Pratama',
            'alamat' => 'Jl. Merdeka No.1',
            'nomor_telepon' => '0814141414'
        ]);

        Pelanggan::create([
            'nama' => 'Budi Santoso',
            'alamat' => 'Jl. Raya No.2',
            'nomor_telepon' => '0813131313'
        ]);

        Pelanggan::create([
            'nama' => 'Citra Dewi',
            'alamat' => 'Jl. Bunga No.3',
            'nomor_telepon' => '08121212'
        ]);
    }
}
