@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Mutasi Lokasi</h2>

    <form action="{{ route('admin.mutasi_lokasi.update', $mutasi->id_mutasi_lokasi) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Lokasi</label>
            <select name="id_lokasi" class="form-control" required>
                @foreach ($lokasi as $l)
                    <option value="{{ $l->id_lokasi }}" {{ $mutasi->id_lokasi == $l->id_lokasi ? 'selected' : '' }}>{{ $l->nama_lokasi }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Barang</label>
            <select name="id_pengadaan" id="id_pengadaan" class="form-control" required>
                @foreach ($pengadaan as $p)
                    <option value="{{ $p->id_pengadaan }}" {{ $mutasi->id_pengadaan == $p->id_pengadaan ? 'selected' : '' }}>{{ $p->masterBarang->nama_barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="flag_lokasi">Flag Lokasi</label>
            <input type="text" name="flag_lokasi" id="flag_lokasi" class="form-control" value="{{ old('flag_lokasi', $mutasi->flag_lokasi ?? '') }}" required>
        </div>
        
        <div class="mb-3">
            <label for="flag_pindah">Flag Pindah</label>
            <input type="text" name="flag_pindah" id="flag_pindah" class="form-control" value="{{ old('flag_pindah', $mutasi->flag_pindah ?? '') }}" required>
        </div>
        

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
