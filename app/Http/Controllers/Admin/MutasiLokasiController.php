<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Lokasi;
use App\Models\MasterBarang;
use App\Models\MutasiLokasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class MutasiLokasiController extends Controller
{
    // Menampilkan daftar mutasi lokasi
    public function index()
    {
        $mutasiLokasis = MutasiLokasi::with(['pengadaan', 'lokasi'])->get();
        // dd($mutasiLokasis);
        return view('admin.mutasi_lokasi.index', compact('mutasiLokasis'));
    }

    // Menampilkan form untuk membuat mutasi lokasi baru
    public function create()
    {
        $lokasi = Lokasi::all();
        $pengadaan = Pengadaan::with('masterBarang')->get();
        return view('admin.mutasi_lokasi.create', compact('lokasi', 'pengadaan'));
    }

    // Menyimpan mutasi lokasi baru
    public function store(Request $request)
    {
        // dd(vars: $request->all());
        $vallidated = $request->validate([
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'flag_lokasi' => 'required|string|max:45',
            'flag_pindah' => 'required|string|max:45',
        ]);

        MutasiLokasi::create( $vallidated);

        return redirect()->route('admin.mutasi_lokasi.index');
    }

    // Menampilkan form untuk mengedit mutasi lokasi
    public function edit($id)
    {
        $mutasi = MutasiLokasi::where('id_mutasi_lokasi', $id)->first();
        $mustasis = MutasiLokasi::all();
        $lokasi = Lokasi::all();
        $pengadaan = Pengadaan::with('masterBarang')->get();
        return view('admin.mutasi_lokasi.edit', compact('mutasi', 'lokasi', 'pengadaan', 'mustasis'));
    }

    // Memperbarui data mutasi lokasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'flag_lokasi' => 'required|string',
            'flag_pindah' => 'required|string'
        ]);

        $mutasi = MutasiLokasi::findOrFail($id);
        $mutasi->update($request->all());

        return redirect()->route('admin.mutasi_lokasi.index')->with('success', 'Mutasi Lokasi berhasil diperbarui');
    }

    // Menghapus mutasi lokasi
    public function destroy($id)
    {
        $mutasiLokasi = MutasiLokasi::findOrFail($id);
        $mutasiLokasi->delete();

        return redirect()->route('admin.mutasi_lokasi.index');
    }
}
