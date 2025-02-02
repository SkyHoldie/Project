<?php

// app/Models/MasterBarang.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;

    protected $table = 'tbl_master_barang'; // Pastikan tabel yang benar

    protected $primaryKey = 'id_barang';

    // Kolom-kolom yang dapat diisi
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'spesifikasi_teknis',
    ];


    public function pengadaan()
    {
        return $this->hasMany(Pengadaan::class, 'id_master_barang', 'id_barang');
    }

}
