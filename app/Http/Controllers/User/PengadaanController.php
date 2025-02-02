<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Pengadaan;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    // Menampilkan daftar pengadaan
    public function index()
    {
        $pengadaan = Pengadaan::all();
        return view('user.pengadaan.index', compact('pengadaan'));
    }

}
