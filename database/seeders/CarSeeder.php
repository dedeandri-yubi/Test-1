<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB ::table('cars')->insert([
            'merek' => 'Toyota',
            'model' => 'Avanza',
            'tahun' => '2019',
            'warna' => 'Merah',
            'plat_nomor' => 'B 1234 ABC',
            'harga_sewa' => '100000',
            'status' => 'Tersedia',
        ]);
    }
}
