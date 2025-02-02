<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAsset extends Model
{
    use HasFactory;

    protected $table = 'tbl_kategori_asset'; // Nama tabel di database
    protected $primaryKey = 'id_kategori_asset'; // Primary key tabel
    public $incrementing = false;
    public $timestamps = true; // Aktifkan timestamps

    protected $fillable = [
        'kode_kategori_asset',
        'kategori_asset',
    ];

    public function subKategoriAssets()
    {
        return $this->hasMany(SubKategoriAsset::class, 'id_kategori_asset', 'id_kategori_asset');
    }
}
