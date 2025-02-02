@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Satuan</h1>
    <form action="{{ route('admin.satuan.update', $satuan->id_satuan) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_satuan" class="form-label">Nama Satuan</label>
            <input type="text" name="nama_satuan" id="nama_satuan" class="form-control" value="{{ old('nama_satuan', $satuan->nama_satuan) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.satuan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
