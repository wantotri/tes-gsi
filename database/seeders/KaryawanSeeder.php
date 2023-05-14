<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftar_karyawan = [
            ['npk' => '10001', 'nama' => 'Agus', 'alamat' => 'Jakarta'],
            ['npk' => '10002', 'nama' => 'Asep', 'alamat' => 'Purbalingga'],
            ['npk' => '10003', 'nama' => 'Jajang', 'alamat' => 'Subang'],
        ];

        DB::table('master_karyawan')->insert($daftar_karyawan);
    }
}
