<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\HitungDepresiasi;
use Illuminate\Http\Request;

class HitungDepresiasiController extends Controller
{
    // Menampilkan daftar hitung depresiasi
    public function index()
    {
        $hitungDepresiasis = HitungDepresiasi::all(); // Mengambil semua data hitung depresiasi
        return view('user.hitung_depresiasi.index', compact('hitungDepresiasis'));
    }
}
