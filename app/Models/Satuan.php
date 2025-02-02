<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    protected $table = 'tbl_satuan'; // Nama tabel
    protected $primaryKey = 'id_satuan'; // Primary key

    protected $fillable = [
        'nama_satuan',
    ];

    
    public function pengadaan()
    {
        return $this->hasMany(Pengadaan::class , 'id_satuan' , 'id_satuan');
    }
}
