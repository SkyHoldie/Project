<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Depresiasi;
use App\Models\Distributor;
use App\Models\HitungDepresiasi;
use App\Models\MasterBarang;
use App\Models\Merk;
use App\Models\Pengadaan;
use App\Models\Satuan;
use App\Models\SubKategoriAsset;
use Illuminate\Http\Request;

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

        return view('admin.pengadaan.index', compact('pengadaan'));
    }

    // Menampilkan form untuk membuat pengadaan baru
    public function create()
    {
        $masters = MasterBarang::all();
        $depresiasis = Depresiasi::all();
        $merks = Merk::all();
        $satuans = Satuan::all();
        $subs = SubKategoriAsset::all();
        $distributors = Distributor::all();

        return view('admin.pengadaan.create', compact(
            'masters',
            'depresiasis',
            'merks',
            'satuans',
            'subs',
            'distributors'
        ));
    }

    // Menyimpan pengadaan baru dan menghitung depresiasi_barang
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_master_barang' => 'required|string|max:10|exists:tbl_master_barang,id_barang',
            'id_depresiasi' => 'required|string|max:10|exists:tbl_depresiasi,id_depresiasi',
            'id_merk' => 'required|string|max:10|exists:tbl_merk,id_merk',
            'id_satuan' => 'required|string|max:10|exists:tbl_satuan,id_satuan',
            'id_sub_kategori_asset' => 'required|string|max:10|exists:tbl_sub_kategori_asset,id_sub_kategori_asset',
            'id_distributor' => 'required|string|max:10|exists:tbl_distributor,id_distributor',
            'kode_pengadaan' => 'required|string|max:20',
            'no_invoice' => 'required|string|max:20',
            'no_seri_barang' => 'required|string|max:50',
            'tahun_produksi' => 'required|numeric|digits:4',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|numeric|min:0',
            'nilai_barang' => 'required|numeric|min:0',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|string|max:50',
        ]);
        // Simpan ke database
        Pengadaan::create($validatedData);

        return redirect()->route('admin.pengadaan.index')->with('success', 'Data pengadaan berhasil disimpan dengan depresiasi awal.');
    }

    // Menampilkan pengadaan berdasarkan ID
    public function show($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        return view('admin.pengadaan.show', compact('pengadaan'));
    }

    // Menampilkan form untuk mengedit pengadaan
    public function edit($id)
    {
        $masters = MasterBarang::all();
        $depresiasis = Depresiasi::all();
        $merks = Merk::all();
        $satuans = Satuan::all();
        $subs = SubKategoriAsset::all();
        $distributors = Distributor::all();
        $pengadaan = Pengadaan::where('id_pengadaan', $id)->first();

        return view('admin.pengadaan.edit', compact(
            'pengadaan',
            'masters',
            'depresiasis',
            'merks',
            'satuans',
            'subs',
            'distributors'
        ));
    }

    // Memperbarui pengadaan
    public function update(Request $request, $id)
    {
        $pengadaan = Pengadaan::findOrFail($id);

        $validatedData = $request->validate([
            'harga_barang' => 'required|numeric|min:0',
            'id_depresiasi' => 'required|string|max:10|exists:tbl_depresiasi,id_depresiasi',
        ]);

        // Ambil lama depresiasi terbaru
        $depresiasi = Depresiasi::findOrFail($request->id_depresiasi);
        $depresiasi_barang = $validatedData['harga_barang'] / $depresiasi->lama_depresiasi;

        // Update depresiasi_barang juga
        $pengadaan->update(array_merge($validatedData, ['depresiasi_barang' => $depresiasi_barang]));

        return redirect()->route('admin.pengadaan.index')->with('success', 'Data pengadaan berhasil diperbarui.');
    }

    // Menghapus pengadaan
    public function destroy($id)
    {
        Pengadaan::findOrFail($id)->delete();
        return redirect()->route('admin.pengadaan.index')->with('success', 'Data pengadaan berhasil dihapus.');
    }
}
