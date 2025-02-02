<?php

use App\Http\Controllers\Admin\AdminControllers;
use App\Http\Controllers\Admin\DepresiasiController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\HitungDepresiasiController;
use App\Http\Controllers\Admin\KategoriAssetController;
use App\Http\Controllers\Admin\LokasiController;
use App\Http\Controllers\Admin\MasterBarangController;
use App\Http\Controllers\Admin\MerkController;
use App\Http\Controllers\Admin\MutasiLokasiController;
use App\Http\Controllers\Admin\OpnameController;
use App\Http\Controllers\Admin\PengadaanController;
use App\Http\Controllers\Admin\SatuanController;
use App\Http\Controllers\Admin\SubKategoriAssetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserControllers;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminControllers::class, 'index'])->name('dashboard');

    Route::resource('/hitung_depresiasi', HitungDepresiasiController::class);
    Route::get('/hitung_depresiasi/{id_pengadaan}',[ HitungDepresiasiController::class, 'show'])->name('hitung_depresiasi.detail');
    Route::resource('/opname', OpnameController::class);
    Route::resource('/mutasi_lokasi', MutasiLokasiController::class);
    Route::resource('/lokasi', LokasiController::class);
    Route::resource('/pengadaan', PengadaanController::class);
    Route::resource('/distributor', DistributorController::class);
    Route::resource('/merk', MerkController::class);
    Route::resource('/satuan', SatuanController::class);
    Route::resource('/depresiasi', DepresiasiController::class);
    Route::resource('/master_barang', MasterBarangController::class);
    Route::resource('/sub_kategori_asset', SubKategoriAssetController::class);
    Route::resource('/kategori_asset', KategoriAssetController::class);
});
Route::prefix('user')->name('user.')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('dashboard', [UserControllers::class, 'index'])->name('dashboard');

    Route::resource('hitung_depresiasi', \App\Http\Controllers\User\HitungDepresiasiController::class);
    Route::resource('opname', \App\Http\Controllers\User\OpnameController::class);
    Route::resource('pengadaan', \App\Http\Controllers\User\PengadaanController::class);


});

// // Rute untuk login dan logout
// Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Route::post('login', [AuthenticatedSessionController::class, 'store']);
// Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
//     ->middleware('auth')
//     ->name('logout');

// Rute untuk halaman dashboard
Route::get('/', function () {
    return view('welcome');
});



// Rute untuk profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
