<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depresiasi extends Model
{
    use HasFactory;

    // Tentukan tabel jika nama tabel berbeda dengan nama model
    protected $table = 'tbl_depresiasi';

    protected $primaryKey = 'id_depresiasi';
    // Tentukan kolom yang dapat diisi (optional)
    protected $fillable = [
        'lama_depresiasi',
        'keterangan',
    ];
    
    public function pengadaan()
    {
        return $this->hasMany(Pengadaan::class, 'id_depresiasi', 'id_depresiasi');

    }
}
