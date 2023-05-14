<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftar_username = [
            ['username' => '10001', 'password' => Hash::make('admin1234'), 'create_date' => '2021-01-01 08:00', 'created_by' => 'system'],
            ['username' => '10002', 'password' => Hash::make('admin1234'), 'create_date' => '2021-01-01 08:00', 'created_by' => 'system'],
        ];

        DB::table('login')->insert($daftar_username);
    }
}
