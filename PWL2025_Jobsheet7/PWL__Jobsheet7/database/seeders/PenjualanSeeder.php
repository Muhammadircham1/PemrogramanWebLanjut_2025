<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        // Data transaksi penjualan
        $data = [
            ['penjualan_id' => 1, 'tanggal' => '2024-03-01', 'nama_pelanggan' => 'Andi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 2, 'tanggal' => '2024-03-02', 'nama_pelanggan' => 'Budi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 3, 'tanggal' => '2024-03-03', 'nama_pelanggan' => 'Citra', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 4, 'tanggal' => '2024-03-04', 'nama_pelanggan' => 'Dewi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 5, 'tanggal' => '2024-03-05', 'nama_pelanggan' => 'Eko', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 6, 'tanggal' => '2024-03-06', 'nama_pelanggan' => 'Faisal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 7, 'tanggal' => '2024-03-07', 'nama_pelanggan' => 'Gita', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 8, 'tanggal' => '2024-03-08', 'nama_pelanggan' => 'Hendra', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 9, 'tanggal' => '2024-03-09', 'nama_pelanggan' => 'Indah', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 10, 'tanggal' => '2024-03-10', 'nama_pelanggan' => 'Joko', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
