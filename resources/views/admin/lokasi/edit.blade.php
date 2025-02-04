@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Lokasi</h4>
    <form action="{{ route('admin.lokasi.update', $lokasi->id_lokasi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Lokasi</label>
            <input type="text" name="nama_lokasi" class="form-control" value="{{ $lokasi->nama_lokasi }}" required maxlength="20">
        </div>
        <div class="mb-3">
            <label>Kode Lokasi</label>
            <input type="text" name="kode_lokasi" class="form-control" value="{{ $lokasi->kode_lokasi }}" required maxlength="20">
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $lokasi->keterangan }}" maxlength="50">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.lokasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
