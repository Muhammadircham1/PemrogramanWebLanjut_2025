<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $data = 
        [
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'BRG002', 'barang_nama' => 'Mie Goreng', 'harga_beli' => 9000, 'harga_jual' => 14000], // Makanan
            ['barang_id' => 3, 'kategori_id' => 1, 'barang_kode' => 'BRG003', 'barang_nama' => 'Ayam Bakar', 'harga_beli' => 12000, 'harga_jual' => 18000], // Makanan
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'BRG004', 'barang_nama' => 'Kaos Polos', 'harga_beli' => 30000, 'harga_jual' => 45000], // Pakaian
            ['barang_id' => 5, 'kategori_id' => 2, 'barang_kode' => 'BRG005', 'barang_nama' => 'Celana Jeans', 'harga_beli' => 70000, 'harga_jual' => 100000], // Pakaian
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'BRG006', 'barang_nama' => 'Keripik Kentang', 'harga_beli' => 8000, 'harga_jual' => 12000], // Snack
            ['barang_id' => 7, 'kategori_id' => 3, 'barang_kode' => 'BRG007', 'barang_nama' => 'Biskuit Coklat', 'harga_beli' => 5000, 'harga_jual' => 9000], // Snack
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'BRG008', 'barang_nama' => 'Apel Fuji', 'harga_beli' => 15000, 'harga_jual' => 20000], // Buah-buahan
            ['barang_id' => 9, 'kategori_id' => 4, 'barang_kode' => 'BRG009', 'barang_nama' => 'Jeruk Manis', 'harga_beli' => 10000, 'harga_jual' => 15000], // Buah-buahan
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'BRG010', 'barang_nama' => 'Wortel Segar', 'harga_beli' => 7000, 'harga_jual' => 10000], // Sayuran
            ['barang_id' => 11, 'kategori_id' => 5, 'barang_kode' => 'BRG011', 'barang_nama' => 'Bayam Hijau', 'harga_beli' => 5000, 'harga_jual' => 8000], // Sayuran
        ];
    

        DB::table('m_barang')->insert($data);
    }
}
