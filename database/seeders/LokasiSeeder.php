<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftar_lokasi = [
            ['kode' => 'L001', 'nama_lokasi' => 'Lokasi 1'],
            ['kode' => 'L002', 'nama_lokasi' => 'Lokasi 2'],
            ['kode' => 'L003', 'nama_lokasi' => 'Lokasi 3'],
            ['kode' => 'L004', 'nama_lokasi' => 'Lokasi 4'],
        ];

        DB::table('master_lokasi')->insert($daftar_lokasi);
    }
}
