<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Depresiasi;
use App\Models\HitungDepresiasi;
use Illuminate\Http\Request;

class HitungDepresiasiController extends Controller
{
    // Menampilkan daftar hitung depresiasi
    public function index()
    {
        $depresiasiItems = HitungDepresiasi::with('pengadaan')->get();
        $depresis = Depresiasi::all();

        return view('user.hitung_depresiasi.index', compact('depresiasiItems', 'depresis'));
    }
}
