<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Pengadaan;


class PengadaanController extends Controller
{
    // Menampilkan daftar pengadaan
    public function index()
    {
        // $barangDepresiasi = HitungDepresiasi::all();
        $pengadaan = Pengadaan::with([
            'masterBarang',
            'depresiasi',
            'merk',
            'satuan',
            'subKategoriAsset',
            'distributor',
            'hitungDepresiasi'
        ])->get();
        // Perhitungan depresiasi barang berdasarkan bulan saat ini
        foreach ($pengadaan as $item) {
            if ($item->depresiasi) {
                $lama_depresiasi_bulan = $item->depresiasi->lama_depresiasi * 12; // Menghitung dalam bulan
                $penyusutan_per_bulan = $item->harga_barang / $lama_depresiasi_bulan;

                $nilai_barang = $item->harga_barang;
                $bulan_sekarang = \Carbon\Carbon::now()->month; // Mendapatkan bulan saat ini

                $nilai_depresiasi = 0;
                for ($bulan_counter = 1; $bulan_counter <= $bulan_sekarang; $bulan_counter++) {
                    $nilai_barang -= $penyusutan_per_bulan;
                }

                // Menyimpan nilai depresiasi yang sudah dihitung untuk ditampilkan di view
                $item->nilai_depresiasi_terkini = max(0, $nilai_barang);
            }
        }

        return view('user.pengadaan.index', compact('pengadaan'));
    }

}
