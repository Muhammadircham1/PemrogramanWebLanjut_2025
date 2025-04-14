<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        $suppliers = 
        [
            ['supplier_kode' => 'SUP001', 'supplier_nama' => 'PT Makmur Jaya', 'supplier_telp' => '021-555-1234', 'supplier_alamat' => 'Jl. Sudirman No. 123, Jakarta'],
            ['supplier_kode' => 'SUP002', 'supplier_nama' => 'CV Sejahtera Abadi', 'supplier_telp' => '031-777-5678', 'supplier_alamat' => 'Jl. Raya Darmo No. 45, Surabaya'],
            ['supplier_kode' => 'SUP003', 'supplier_nama' => 'UD Sentosa Baru', 'supplier_telp' => '022-333-9012', 'supplier_alamat' => 'Jl. Asia Afrika No. 78, Bandung'],
        ];

        DB::table('m_supplier')->insert($suppliers);
    }
}