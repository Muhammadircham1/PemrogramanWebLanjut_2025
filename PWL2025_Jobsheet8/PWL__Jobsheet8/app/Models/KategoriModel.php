<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';
    public $timestamps = true; // Menggunakan created_at dan updated_at

    protected $fillable = [
        'kategori_kode', 
        'kategori_nama', 
        'created_at', 
        'updated_at'
    ];

 
}
