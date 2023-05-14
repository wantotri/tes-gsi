<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            KaryawanSeeder::class,
            ItemSeeder::class,
            LokasiSeeder::class,
            AchievementSeeder::class,
            PlanningSeeder::class,
            TransaksiProduksiSeeder::class,
            LoginSeeder::class,
        ]);
    }
}
