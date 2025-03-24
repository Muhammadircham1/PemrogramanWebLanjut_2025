<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokModel extends Model
{
    use HasFactory;

    protected $table = 't_stok'; // Sesuai nama tabel di database
    protected $primaryKey = 'stok_id'; // Primary key tabel
    protected $fillable = ['barang_id', 'jumlah', 'keterangan', 'created_at', 'updated_at']; // Sesuaikan dengan tabel

    public function barang(): BelongsTo
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}
