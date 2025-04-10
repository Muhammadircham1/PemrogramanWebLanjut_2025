<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level'; // Nama tabel di database
    protected $primaryKey = 'level_id'; // Primary Key

    public $timestamps = false; // Menonaktifkan timestamps jika tidak ada kolom created_at & updated_at

    protected $fillable = [
        'level_kode',
        'level_nama'
    ];
}
