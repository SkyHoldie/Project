<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriAsset;
use App\Models\SubKategoriAsset;
use Illuminate\Http\Request;


class KategoriAssetController extends Controller
{
    // Menampilkan semua kategori asset
    public function index()
    {
        $kategori_assets = KategoriAsset::all();
        return view('admin.kategori_asset.index', compact('kategori_assets'));
    }

    // Menampilkan formulir untuk membuat kategori asset baru
    public function create()
    {

        return view('admin.kategori_asset.create');
    }

    // Menyimpan kategori asset baru ke database
    public function store(Request $request)
    {
        // dd($request->all());

        // Validasi data yang diterima dari form
        $validated = $request->validate([

            // 'id_status_alumni' => 'required|exists:tbl_status_alumni,id_status_alumni',
            'kode_kategori_asset' => 'required|string|max:20|unique:tbl_kategori_asset,kode_kategori_asset',
            'kategori_asset' => 'required|string|max:25|unique:tbl_kategori_asset,kategori_asset',
        ]);

        KategoriAsset::create($request->all());
        // dd($validated);
        return redirect()->route('admin.kategori_asset.index')->with('success', 'Merk berhasil ditambahkan.');

    }

    // Menampilkan formulir untuk mengedit kategori asset
    public function edit($id)
    {
        $kategori_asset = KategoriAsset::where('id_kategori_asset', $id)->get()->first();
        return view('admin.kategori_asset.edit', compact('kategori_asset'));
    }

    // Memperbarui kategori asset di database
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'kode_kategori_asset' => 'required|string|max:20|unique:tbl_kategori_asset,kode_kategori_asset,' . $id . ',id_kategori_asset',
            'kategori_asset' => 'required|string|max:25',
        ]);

        $kategori_asset = KategoriAsset::findOrFail($id);
        $kategori_asset->update($request->all());

        return redirect()->route('admin.kategori_asset.index')->with('success', 'Kategori Asset berhasil diperbarui!');
    }
    public function show($id)
    {

    }
    // Menghapus kategori asset dari database
    public function destroy($id)
    {
        $kategori_asset = KategoriAsset::findOrFail($id);

        // Hapus semua sub kategori terkait terlebih dahulu
        SubKategoriAsset::where('id_kategori_asset', $id)->delete();

        // Setelah sub kategori dihapus, hapus kategori aset
        $kategori_asset->delete();

        return redirect()->route('admin.kategori_asset.index')->with('success', 'Kategori Asset berhasil dihapus!');
    }
}
