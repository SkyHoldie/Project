@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Satuan</h1>
    <form action="{{ route('admin.satuan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_satuan" class="form-label">Nama Satuan</label>
            <input type="text" name="nama_satuan" id="nama_satuan" class="form-control" placeholder="Masukkan nama satuan" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.satuan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
