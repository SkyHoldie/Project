@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Barang</h1>
    <form action="{{ route('admin.master_barang.update', $masterBarang->id_barang) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $masterBarang->nama_barang }}" required>
        </div>
        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ $masterBarang->kode_barang }}" required>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Spesifikasi Teknis</label>
            <input type="text" class="form-control" id="spesifikasi_teknis" name="spesifikasi_teknis" value="{{ $masterBarang->spesifikasi_teknis }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
