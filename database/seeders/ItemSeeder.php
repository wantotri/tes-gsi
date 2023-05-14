<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftar_item = [
            ['kode' => 'M001', 'nama_item' => 'Bolpen'],
            ['kode' => 'M002', 'nama_item' => 'Pensil'],
            ['kode' => 'M003', 'nama_item' => 'Penghapus'],
            ['kode' => 'M004', 'nama_item' => 'Spidol'],
        ];

        DB::table('master_item')->insert($daftar_item);
    }
}
