<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    // Menampilkan daftar distributor
    public function index()
    {
        $distributors = Distributor::all();
        return view('admin.distributor.index', compact('distributors'));
    }

    // Menambahkan distributor baru
    public function create()
    {
        return view('admin.distributor.create');
    }

    // Menyimpan distributor baru
    public function store(Request $request)
    {
        // Validasi dan simpan distributor
        $request->validate([
            'nama_distributor' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'no_telp' => 'required|string|max:15',
            'email'=> 'required|string|max:30',
            'keterangan'=> 'required|string|max:45',
        ]);

        Distributor::create($request->all());
        return redirect()->route('admin.distributor.index');
    }

    // Edit distributor
    public function edit($id)
    {
        $distributor = Distributor::where('id_distributor',$id)->first();
        return view('admin.distributor.edit', compact('distributor'));
    }

    // Update distributor
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_distributor' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'no_telp' => 'required|string|max:15',
            'email'=> 'required|string|max:30',
            'keterangan'=> 'required|string|max:45',
        ]);
        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());
        return redirect()->route('admin.distributor.index');
    }
 
    // Menghapus distributor
    public function destroy($id)
    {
        Distributor::findOrFail($id)->delete();
        return redirect()->route('admin.distributor.index');
    }
}
