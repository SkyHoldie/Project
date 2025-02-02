@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Merk</h1>

    <form action="{{ route('admin.merk.update', $merk->id_merk) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="merk" class="form-label">Nama Merk</label>
            <input type="text" name="merk" id="merk" class="form-control @error('merk') is-invalid @enderror" value="{{ old('merk', $merk->merk) }}">
            @error('merk')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan', $merk->keterangan) }}">
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.merk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
