<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            LevelSeeder::class,
            KategoriSeeder::class,
            UserSeeder::class,
            BarangSeeder::class,
            PenjualanSeeder::class,
            StokSeeder::class,
            PenjualanDetailSeeder::class, // Periksa apakah ini benar
        ]);
    }
}
