<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_penjualan_detail')->insert([
            [
                'penjualan_id' => 1,
                'barang_id'    => 1,
                'jumlah'       => 2,
                'harga'        => 2000000,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'penjualan_id' => 1,
                'barang_id'    => 2,
                'jumlah'       => 1,
                'harga'        => 500000,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'penjualan_id' => 2,
                'barang_id'    => 3,
                'jumlah'       => 3,
                'harga'        => 1500000,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
        ]);
    }
}
