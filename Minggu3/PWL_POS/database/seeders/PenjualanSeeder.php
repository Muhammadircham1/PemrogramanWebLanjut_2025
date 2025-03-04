<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'tanggal' => now(),
                'total_harga' => rand(50000, 500000),
            ];
        }

        DB::table('t_penjualan')->insert($data);
    }
}
