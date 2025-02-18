<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            ['nama' => 'Salma Maulidia', 'email' => 'salma@example.com', 'no_hp' => '081234567890'],
            ['nama' => 'Ahmad Pratama', 'email' => 'ahmad@example.com', 'no_hp' => '081212121212'],
            ['nama' => 'Rina Kartika', 'email' => 'rina@example.com', 'no_hp' => '081345678912'],
            ['nama' => 'Budi Santoso', 'email' => 'budi@example.com', 'no_hp' => '081567890123'],
            ['nama' => 'Aulia Putri', 'email' => 'aulia@example.com', 'no_hp' => '081678901234'],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}
