@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Mutasi Lokasi</h2>

    <form action="{{ route('admin.mutasi_lokasi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Lokasi</label>
            <select name="id_lokasi" id="id_lokasi" class="form-control" required>
                @foreach ($lokasi as $l)
                    <option value="{{ $l->id_lokasi }}">{{ $l->nama_lokasi }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Barang</label>
            <select name="id_pengadaan" id="id_pengadaan" class="form-control" required>
                @foreach ($pengadaan as $p)
                    <option value="{{ $p->id_pengadaan }}">{{ $p->masterBarang->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Flag Lokasi</label>
            <input type="text" id="flag_lokasi" name="flag_lokasi" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Flag Pindah</label>
            <input type="text" id="flag_pindah" name="flag_pindah" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
