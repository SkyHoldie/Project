@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Tambah Opname</h1>
        <form action="{{ route('admin.opname.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Pengadaan</label>
                <select name="id_pengadaan" class="form-control">
                    @foreach($pengadaans as $pengadaan)
                        <option value="{{ $pengadaan->id_pengadaan }}">{{ $pengadaan->masterBarang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Opname</label>
                <input type="date" name="tgl_opname" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Kondisi</label>
                <input type="text" name="kondisi" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection