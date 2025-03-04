<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_barang' => 'Laptop', 'kategori_id' => 1, 'harga' => 10000000],
            ['nama_barang' => 'Baju', 'kategori_id' => 2, 'harga' => 150000],
            ['nama_barang' => 'Nasi Goreng', 'kategori_id' => 3, 'harga' => 25000],
            ['nama_barang' => 'Teh Botol', 'kategori_id' => 4, 'harga' => 5000],
            ['nama_barang' => 'Meja Kayu', 'kategori_id' => 5, 'harga' => 2000000],
            ['nama_barang' => 'Smartphone', 'kategori_id' => 1, 'harga' => 7000000],
            ['nama_barang' => 'Celana Jeans', 'kategori_id' => 2, 'harga' => 200000],
            ['nama_barang' => 'Roti Bakar', 'kategori_id' => 3, 'harga' => 30000],
            ['nama_barang' => 'Jus Jeruk', 'kategori_id' => 4, 'harga' => 10000],
            ['nama_barang' => 'Kursi Plastik', 'kategori_id' => 5, 'harga' => 150000],
        ];

        DB::table('m_barang')->insert($data);
    }
}
