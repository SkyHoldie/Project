<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Opname;
use Illuminate\Http\Request;

class OpnameController extends Controller
{
    // Menampilkan daftar opname
    public function index()
    {
        $opnames = Opname::all();
        return view('user.opname.index', compact('opnames'));
    }

    
}
