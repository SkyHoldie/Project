<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'tbl_pengadaan';
    protected $primaryKey = 'id_pengadaan';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_master_barang',
        'id_depresiasi',
        'id_merk',
        'id_satuan',
        'id_sub_kategori_asset',
        'id_distributor',
        'kode_pengadaan',
        'no_invoice',
        'no_seri_barang',
        'tahun_produksi',
        'tgl_pengadaan',
        'harga_barang',
        'nilai_barang',
        'depresiasi_barang', // Kolom baru untuk nilai depresiasi
        'fb',
        'keterangan',
    ];
    

    // Relasi dengan MasterBarang
    public function masterBarang()
    {
        return $this->belongsTo(MasterBarang::class, 'id_master_barang', 'id_barang');
    }

    // Relasi dengan Depresiasi
    public function depresiasi()
    {
        return $this->belongsTo(Depresiasi::class, 'id_depresiasi', 'id_depresiasi');
    }

    // Relasi dengan Merk
    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id_merk');
    }

    // Relasi dengan Satuan
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan', 'id_satuan');
    }

    // Relasi dengan SubKategoriAsset
    public function subKategoriAsset()
    {
        return $this->belongsTo(SubKategoriAsset::class, 'id_sub_kategori_asset', 'id_sub_kategori_asset');
    }

    // Relasi dengan Distributor
    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'id_distributor', 'id_distributor');
    }

    public function mutasiLokasi()
    {
        return $this->hasMany(MutasiLokasi::class, 'id_pengadaan', 'id_pengadaan');
    }

    // Perbaikan relasi opname (Menggunakan hasMany, bukan belongsTo)
    public function opname()
    {
        return $this->hasMany(Opname::class, 'id_pengadaan', 'id_pengadaan');
    }

    // Fungsi untuk menghitung depresiasi
    public function hitungDepresiasi()
    {
        return $this->hasMany(HitungDepresiasi::class, 'id_pengadaan');
    }
}
