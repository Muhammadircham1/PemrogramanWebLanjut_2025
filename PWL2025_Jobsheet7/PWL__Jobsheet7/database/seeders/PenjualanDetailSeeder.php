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
            [
                'penjualan_id' => 2,
                'barang_id'    => 4,
                'jumlah'       => 5,
                'harga'        => 2500000,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'penjualan_id' => 3,
                'barang_id'    => 5,
                'jumlah'       => 2,
                'harga'        => 1200000,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'penjualan_id' => 3,
                'barang_id'    => 6,
                'jumlah'       => 1,
                'harga'        => 700000,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'penjualan_id' => 4,
                'barang_id'    => 7,
                'jumlah'       => 4,
                'harga'        => 1800000,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'penjualan_id' => 5,
                'barang_id'    => 8,
                'jumlah'       => 3,
                'harga'        => 2100000,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'penjualan_id' => 5,
                'barang_id'    => 9,
                'jumlah'       => 2,
                'harga'        => 900000,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
            [
                'penjualan_id' => 6,
                'barang_id'    => 10,
                'jumlah'       => 1,
                'harga'        => 3000000,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ],
        ]);
    }
}
