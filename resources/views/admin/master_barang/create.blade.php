@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Barang</h1>
    <form action="{{ route('admin.master_barang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
        </div>

        <div class="mb-3">
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
        </div>
        <div class="mb-3">
            <label for="spesifikasi_teknis" class="form-label">Spesifikasi Teknis</label>
            <input type="text" class="form-control" id="spesifikasi_teknis" name="spesifikasi_teknis" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
