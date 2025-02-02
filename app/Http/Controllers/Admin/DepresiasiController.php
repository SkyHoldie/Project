<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Depresiasi;
use Illuminate\Http\Request;

class DepresiasiController extends Controller
{
    public function index()
    {
        $depresiasi = Depresiasi::all();
       
        return view('admin.depresiasi.index', compact('depresiasi'));
    }

    public function create()
    {
        return view('admin.depresiasi.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // Validasi dan simpan data
        $validated = $request->validate([
            'lama_depresiasi' => 'required|string|max:11',
            'keterangan' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        try {
            Depresiasi::create($validated);
            return redirect()->route('admin.depresiasi.index')->with('success', 'depresiasi berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $depresiasi = Depresiasi::findOrFail($id);
        return view('admin.depresiasi.show', compact('depresiasi'));
    }

    public function edit($id)
    {
        $depresiasi = Depresiasi::where('id_depresiasi', $id)->first();
        // dd($depresiasi);
        return view('admin.depresiasi.edit', compact('depresiasi'));
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data
        $request->validate([
            'lama_depresiasi'=> 'required|string|max:11',
            'keterangan'=> 'required|string|max:255',
        ]);

        $depresiasi = Depresiasi::findOrFail($id);
        $depresiasi->update($request->all());

        return redirect()->route('admin.depresiasi.index')->with('success', 'Master Barang berhasil diperbarui!');

    }

    public function destroy($id)
    {
        // Hapus data
        $depresiasi = Depresiasi::findOrFail($id);
        $depresiasi->delete();

        return redirect()->route('admin.depresiasi.index')->with('success', 'Master Barang berhasil dihapus!');
    }
}
