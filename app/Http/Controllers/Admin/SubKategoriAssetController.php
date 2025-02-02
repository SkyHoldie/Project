<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubKategoriAsset;
use Illuminate\Http\Request;
use App\Models\KategoriAsset;

class SubKategoriAssetController extends Controller
{
    public function index()
    {
        $subKategoriAssets = SubKategoriAsset::with('kategoriAsset')->get();
        // $kategoriAssets = KategoriAsset::all();
        // dd($subKategoriAssets);
        return view('admin.sub_kategori_asset.index', compact('subKategoriAssets'));
    }

    public function create()
    {
        $kategoriAssets = KategoriAsset::all();
        return view('admin.sub_kategori_asset.create', compact('kategoriAssets'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'kode_sub_kategori_asset' => 'required|string|max:255|unique:tbl_sub_kategori_asset,kode_sub_kategori_asset',
            'nama_sub_kategori' => 'required|string|max:255',
            'id_kategori_asset' => 'required|exists:tbl_kategori_asset,id_kategori_asset', // Validasi kategori
        ]);
        SubKategoriAsset::create($request->all());


        // dd($validated);
        return redirect()->route('admin.merk.index')->with('success', 'Merk berhasil diperbarui.');




        // dd($validated);
        // // Menyimpan data SubKategoriAsset
        // $subKategoriAsset = new SubKategoriAsset();
        // $subKategoriAsset->nama_sub_kategori = $validated['nama_sub_kategori'];
        // $subKategoriAsset->id_kategori_asset = $validated['kategori_id'];
        // $subKategoriAsset->kode_sub_kategori_asset = 'KA' . str_pad($subKategoriAsset->id_sub_kategori_asset, 1, '1', STR_PAD_LEFT); // Contoh kode otomatis
        // $subKategoriAsset->save();

        // Redirect atau memberikan response
// Simpan data ke database

    }

    public function edit($id)
    {
        $subKategoriAsset = SubKategoriAsset::findOrFail($id);
        $kategoriAssets = KategoriAsset::all(); // Menambahkan kategori untuk dropdown, jika perlu
        return view('admin.sub_kategori_asset.edit', compact('subKategoriAsset', 'kategoriAssets'));
    }

    public function update(Request $request, $sub_kategori_asset)
    {
        $request->validate([
            'kode_sub_kategori_asset' => 'required|string|max:255|exists:tbl_sub_kategori_asset,kode_sub_kategori_asset',
            'nama_sub_kategori' => 'required|string|max:255',
            'id_kategori_asset' => 'required|exists:tbl_kategori_asset,id_kategori_asset', // Validasi kategori
        ]);

        $subKategoriAsset = SubKategoriAsset::findOrFail($sub_kategori_asset);
        $subKategoriAsset->update($request->all());


        return redirect()->route('admin.sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil diperbarui.');
    }

    public function destroy($sub_kategori_asset)
    {
        $subKategoriAsset = SubKategoriAsset::findOrFail($sub_kategori_asset);
        $subKategoriAsset->delete();
        return redirect()->route('admin.sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil dihapus.');
    }
}
