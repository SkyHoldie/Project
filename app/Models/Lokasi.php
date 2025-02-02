<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    // Tentukan tabel jika nama tabel berbeda dengan nama model
    protected $table = 'tbl_lokasi';

    protected $primaryKey = 'id_lokasi';
    // Tentukan kolom yang dapat diisi (optional)
    protected $fillable = [
        'kode_lokasi',
        'nama_lokasi',
        'keterangan',
    ];

    public function mutasiLokasi()
    {
        return $this->hasMany(MutasiLokasi::class, 'id_lokasi', 'id_lokasi');
    }
}
