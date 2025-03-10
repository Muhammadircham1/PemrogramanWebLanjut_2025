<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StokSeeder extends Seeder
{
    public function run(): void
    {
        // Data stok sesuai dengan jumlah barang di m_barang
        $data = [
            ['stok_id' => 1, 'barang_id' => 1, 'jumlah' => 50, 'keterangan' => 'Stok awal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stok_id' => 2, 'barang_id' => 2, 'jumlah' => 30, 'keterangan' => 'Stok awal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stok_id' => 3, 'barang_id' => 3, 'jumlah' => 40, 'keterangan' => 'Stok awal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stok_id' => 4, 'barang_id' => 4, 'jumlah' => 25, 'keterangan' => 'Stok awal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stok_id' => 5, 'barang_id' => 5, 'jumlah' => 100, 'keterangan' => 'Stok awal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stok_id' => 6, 'barang_id' => 6, 'jumlah' => 75, 'keterangan' => 'Stok awal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stok_id' => 7, 'barang_id' => 7, 'jumlah' => 60, 'keterangan' => 'Stok awal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stok_id' => 8, 'barang_id' => 8, 'jumlah' => 90, 'keterangan' => 'Stok awal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stok_id' => 9, 'barang_id' => 9, 'jumlah' => 55, 'keterangan' => 'Stok awal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stok_id' => 10, 'barang_id' => 10, 'jumlah' => 80, 'keterangan' => 'Stok awal', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('t_stok')->insert($data);
    }
}
