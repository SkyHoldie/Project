<!-- resources/views/admin/lokasi/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Lokasi Baru</h1>

        <form action="{{ route('admin.lokasi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" required>
            </div>
            <div class="mb-3">
                <label for="kode_lokasi" class="form-label">Kode Lokasi</label>
                <input type="text" class="form-control" id="kode_lokasi" name="kode_lokasi">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
