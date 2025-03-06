<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'nama_barang' => 'Laptop', 'harga' => 5000000, 'stok' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['barang_id' => 2, 'nama_barang' => 'Smartphone', 'harga' => 3000000, 'stok' => 15, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['barang_id' => 3, 'nama_barang' => 'Jaket', 'harga' => 250000, 'stok' => 25, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['barang_id' => 4, 'nama_barang' => 'Celana Jeans', 'harga' => 200000, 'stok' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['barang_id' => 5, 'nama_barang' => 'Roti', 'harga' => 15000, 'stok' => 50, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['barang_id' => 6, 'nama_barang' => 'Mie Instan', 'harga' => 5000, 'stok' => 100, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['barang_id' => 7, 'nama_barang' => 'Teh Botol', 'harga' => 5000, 'stok' => 30, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['barang_id' => 8, 'nama_barang' => 'Kopi Sachet', 'harga' => 2000, 'stok' => 60, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['barang_id' => 9, 'nama_barang' => 'Buku', 'harga' => 50000, 'stok' => 40, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['barang_id' => 10, 'nama_barang' => 'Pensil', 'harga' => 5000, 'stok' => 75, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('m_barang')->insert($data);
    }
}
