<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    // Menampilkan daftar lokasi
    public function index()
    {
        $lokasis = Lokasi::all();
        return view('admin.lokasi.index', compact('lokasis'));
    }

    // Menampilkan form untuk membuat lokasi baru
    public function create()
    {
        return view('admin.lokasi.create');
    }

    // Menyimpan lokasi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|string|max:250',
            'kode_lokasi' => 'required|string',
            'keterangan' => 'nullable',
        ]);

        Lokasi::create(
            $validated
        );

        return redirect()->route('admin.lokasi.index');
    }

    // Menampilkan form untuk mengedit lokasi
    public function edit($id)
    {
        $lokasi = Lokasi::where('id_lokasi',$id)->firstOrFail();
        return view('admin.lokasi.edit', compact('lokasi'));
    }


    // Memperbarui data lokasi
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|string|max:250',
            'kode_lokasi' => 'required|string|max:20',
            'keterangan' => 'nullable|string',
        ]);
    
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($validated);
    
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil diperbarui!');
    }
    

    // Menghapus lokasi
    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        return redirect()->route('admin.lokasi.index');
    }
}
