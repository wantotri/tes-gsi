<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftar_planning = [
            ['kode' => 'M001', 'qty_target' => 10, 'waktu_target' => 20],
            ['kode' => 'M002', 'qty_target' => 15, 'waktu_target' => 30],
            ['kode' => 'M003', 'qty_target' => 12, 'waktu_target' => 24],
            ['kode' => 'M004', 'qty_target' => 14, 'waktu_target' => 28],
        ];

        DB::table('master_planning')->insert($daftar_planning);
    }
}
