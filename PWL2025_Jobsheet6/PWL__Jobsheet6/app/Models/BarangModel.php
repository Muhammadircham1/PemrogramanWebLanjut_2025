<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';
    public $timestamps = true; // Menggunakan created_at dan updated_at

    protected $fillable = [
        'nama_barang', 
        'harga', 
        'stok', 
      
    ];

    
}
