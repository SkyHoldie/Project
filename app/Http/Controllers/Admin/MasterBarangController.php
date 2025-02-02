<?php

namespace App\Http\Controllers\Admin;



use App\Models\KategoriAsset;
use App\Models\MasterBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MasterBarangController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterBarang::query();

        if ($request->has('search')) {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        $masterBarangs = MasterBarang::all();
        return view('admin.master_barang.index', compact('masterBarangs'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'kode_barang' => 'required|string|max:20',
            'spesifikasi_teknis' => 'required|string|max:100',

            // 'id_status_alumni' => 'required|exists:tbl_status_alumni,id_status_alumni',
            // 'kode_kategori_asset' => 'required|string|max:20|unique:tbl_kategori_asset,kode_kategori_asset',
        ]);
        // dd($request->all());
        MasterBarang::create($request->all());
        return redirect()->route('admin.master_barang.index')->with('success', 'Merk berhasil ditambahkan.');



    }

    public function show($id)
    {
        $masterBarang = MasterBarang::where('id_barang', $id)->firstOrFail();
        return view('admin.master_barang.show', compact('masterBarang'));
    }

    public function create()
    {
        return view('admin.master_barang.create');
    }
    public function edit($id)
    {
        $masterBarang = MasterBarang::where('id_barang', $id)->first();
        return view('admin.master_barang.edit', compact('masterBarang'));
    }

    // Memperbarui kategori asset di database
    public function update(Request $request, $id)
    {

        // dd($id_barang);
        $request->validate([
            'kode_barang' => 'required|string|max:20',
            'nama_barang' => 'required|string|max:100',
            'spesifikasi_teknis' => 'required|string|max:100',
        ]);

        $masterBarang = MasterBarang::findOrFail($id);
        $masterBarang->update($request->all());

        return redirect()->route('admin.master_barang.index')->with('success', 'Master Barang berhasil diperbarui!');
    }

    // Menghapus kategori asset dari database
    public function destroy($id)
    {
        $masterBarang = MasterBarang::findOrFail($id);
        $masterBarang->delete();

        return redirect()->route('admin.master_barang.index')->with('success', 'Master Barang berhasil dihapus!');
    }
}
