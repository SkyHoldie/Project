<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pengadaan;
use Carbon\Carbon;

class UpdateDepresiasi extends Command
{
    protected $signature = 'update:depresiasi';
    protected $description = 'Mengupdate nilai depresiasi barang setiap bulan';

    public function handle()
    {
        $this->info('Memulai proses update depresiasi...');

        // Ambil semua data pengadaan yang memiliki informasi depresiasi
        $pengadaans = Pengadaan::with('depresiasi')->get();

        foreach ($pengadaans as $item) {
            if (!$item->depresiasi) {
                continue;
            }
        
            $bulanBerlalu = Carbon::parse($item->tgl_pengadaan)->diffInMonths(Carbon::now());
            $lamaDepresiasi = $item->depresiasi->lama_depresiasi ?: 5; // Default 5 tahun jika null
            $totalBulan = $lamaDepresiasi * 12;
        
            if ($totalBulan > 0) {
                $depresiasiPerBulan = round($item->harga_barang / $totalBulan, 2); // Dibulatkan ke 2 desimal
                $nilai_barang = max(0, $item->harga_barang - ($depresiasiPerBulan * $bulanBerlalu));
        
                // Simpan ke database
                $item->update(['depresiasi_barang' => $nilai_barang]);
            }
        }
        

        $this->info('Update depresiasi selesai.');
    }
}
