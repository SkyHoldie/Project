<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index()
    {
        $satuans = Satuan::all();
        return view('admin.satuan.index', compact('satuans'));
    }

    public function create()
    {
        return view('admin.satuan.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_satuan' => 'required|string|max:255']);
        Satuan::create($request->all());
        return redirect()->route('admin.satuan.index')->with('success', 'Satuan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('admin.satuan.edit', compact('satuan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nama_satuan' => 'required|string|max:255']);
        $satuan = Satuan::findOrFail($id);
        $satuan->update($request->all());
        return redirect()->route('admin.satuan.index')->with('success', 'Satuan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();
        return redirect()->route('admin.satuan.index')->with('success', 'Satuan berhasil dihapus.');
    }
}
