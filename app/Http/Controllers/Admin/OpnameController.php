<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Opname;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class OpnameController extends Controller
{
    // Menampilkan daftar opname
    public function index()
    {
        $opnames = Opname::with(['pengadaan'])->get();
        return view('admin.opname.index', compact('opnames'));
    }

    // Menampilkan form untuk membuat opname baru
    public function create()
    {
        $pengadaans = Pengadaan::with('masterBarang')->get();
        return view('admin.opname.create', compact('pengadaans'));
    }

    // Menyimpan opname baru
    public function store(Request $request)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_opname' => 'required|date',
            'kondisi' => 'required|string|max:25',
            'keterangan' => 'nullable|string|max:100',
        ]);

        Opname::create($request->all());

        return redirect()->route('admin.opname.index');
    }

    // Menampilkan form untuk mengedit opname
    public function edit($id_opname)
    {
        // Cari data opname berdasarkan primary key yang benar
        $opname = Opname::findOrFail($id_opname);
        $pengadaans = Pengadaan::all();
    
        return view('admin.opname.edit', compact('opname', 'pengadaans'));
    }
    

    // Memperbarui data opname
    public function update(Request $request, $id_opname)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_opname' => 'required|date',
            'kondisi' => 'required|string|max:25',
            'keterangan' => 'nullable|string|max:100',
        ]);

        // Cari opname berdasarkan ID
        $opname = Opname::findOrFail($id_opname);

        // Update data tanpa _token dan _method
        $opname->update($request->except(['_token', '_method']));

        return redirect()->route('admin.opname.index')->with('success', 'Data Opname berhasil diperbarui!');
    }


    // Menghapus opname
    public function destroy($id)
    {
        $opname = Opname::findOrFail($id);
        $opname->delete();

        return redirect()->route('admin.opname.index');
    }
}
