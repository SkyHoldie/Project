<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opname extends Model
{
    use HasFactory;

    // Tentukan tabel jika nama tabel berbeda dengan nama model
    protected $table = 'tbl_opname';

    protected $primaryKey = 'id_opname';
    public $timestamps = false; // Jika tabel tidak memiliki created_at & updated_at

    // Tentukan kolom yang dapat diisi (optional)
    protected $fillable = [
        'id_pengadaan',
        'tgl_opname',
        'kondisi',
        'keterangan',
    ];

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan' ,'id_pengadaan');
    }
}
