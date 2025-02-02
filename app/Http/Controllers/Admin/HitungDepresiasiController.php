<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Depresiasi;
use App\Models\HitungDepresiasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HitungDepresiasiController extends Controller
{
    // Menampilkan daftar hitung depresiasi
    public function index()
    {
        $depresiasiItems = HitungDepresiasi::with('pengadaan')->get();
        $depresis = Depresiasi::all();

        return view('admin.hitung_depresiasi.index', compact('depresiasiItems', 'depresis'));
    }

    // Menampilkan form untuk membuat hitung depresiasi baru
    public function create()
    {
        $pengadaan = Pengadaan::with('depresiasi')->get();
        return view('admin.hitung_depresiasi.create', compact('pengadaan'));
    }

    // Menyimpan hitung depresiasi baru
    public function store(Request $request)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_hitung_depresiasi' => 'required|date',
        ]);

        // Ambil data pengadaan beserta relasi depresiasi
        $pengadaan = Pengadaan::with('depresiasi')->findOrFail($request->id_pengadaan);

        // Pastikan ada data depresiasi dan lama_depresiasi lebih dari 0
        if (!$pengadaan->depresiasi || $pengadaan->depresiasi->lama_depresiasi <= 0) {
            return redirect()->back()->withErrors('Usia barang tidak valid atau belum ditentukan.');
        }

        // Ambil lama_depresiasi (dalam tahun) dan konversi ke bulan
        $lama_depresiasi_tahun = $pengadaan->depresiasi->lama_depresiasi;
        $lama_depresiasi_bulan = $lama_depresiasi_tahun * 12; // Ubah tahun ke bulan

        // Harga barang
        $harga_awal = $pengadaan->harga_barang;

        // Hitung depresiasi per bulan
        $penyusutan_per_bulan = $harga_awal / $lama_depresiasi_bulan;

        // Cek apakah ada depresiasi sebelumnya
        $lastDepresiasi = HitungDepresiasi::where('id_pengadaan', $request->id_pengadaan)
            ->orderBy('durasi', 'desc')
            ->first();

        // Tentukan nilai sebelumnya atau harga barang pertama kali
        $nilai_sebelumnya = $lastDepresiasi ? $lastDepresiasi->nilai_barang : $harga_awal;

        // Hitung nilai barang baru setelah depresiasi bulan ini
        $nilai_baru = max(0, $nilai_sebelumnya - $penyusutan_per_bulan);

        // Jika nilai barang sudah 0, hentikan depresiasi
        if ($nilai_sebelumnya <= 0) {
            return redirect()->back()->withErrors('Barang ini sudah mencapai nilai 0, depresiasi tidak bisa dihitung lagi.');
        }

        // Simpan data depresiasi ke tabel HitungDepresiasi
        HitungDepresiasi::create([
            'id_pengadaan' => $request->id_pengadaan,
            'tgl_hitung_depresiasi' => Carbon::parse($request->tgl_hitung_depresiasi),
            'durasi' => $lama_depresiasi_tahun, // Durasi dalam tahun
            'nilai_barang' => $nilai_baru,
        ]);

        // Update nilai barang di tabel Pengadaan
        $pengadaan->update(['depresiasi_barang' => $nilai_baru]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.hitung_depresiasi.index')->with('success', 'Depresiasi bulan ini berhasil dihitung.');
    }


    // Menampilkan form untuk mengedit hitung depresiasi
    public function edit($id)
    {
        $hitungDepresiasi = HitungDepresiasi::findOrFail($id);
        $pengadaan = Pengadaan::with('depresiasi')->get();
        return view('admin.hitung_depresiasi.edit', compact('hitungDepresiasi', 'pengadaan'));
    }

    // Memperbarui data hitung depresiasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_hitung_depresiasi' => 'required|date',
            'nilai_barang' => 'required|numeric|min:0',
        ]);

        $depresiasiItem = HitungDepresiasi::findOrFail($id);

        if ($request->nilai_barang < 0) {
            return redirect()->back()->withErrors('Nilai barang tidak boleh negatif.');
        }

        $depresiasiItem->update([
            'id_pengadaan' => $request->id_pengadaan,
            'tgl_hitung_depresiasi' => $request->tgl_hitung_depresiasi,
            'nilai_barang' => $request->nilai_barang,
        ]);

        return redirect()->route('admin.hitung_depresiasi.index')->with('success', 'Data depresiasi berhasil diperbarui.');
    }

    public function show($id_pengadaan)
    {
        $pengadaan = Pengadaan::with('hitungDepresiasi')->findOrFail($id_pengadaan);

        return view('admin.hitung_depresiasi.detail', compact('pengadaan'));
    }

    // Menghapus data hitung depresiasi
    public function destroy($id_hitung_depresiasi)
    {
        $depresiasiItem = HitungDepresiasi::findOrFail($id_hitung_depresiasi);
        HitungDepresiasi::where('id_pengadaan', $depresiasiItem->id_pengadaan)->delete();

        return redirect()->route('admin.hitung_depresiasi.index')
            ->with('success', 'Semua data depresiasi untuk barang ini berhasil dihapus.');
    }
}
