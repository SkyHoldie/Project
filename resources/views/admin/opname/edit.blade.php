@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Opname</h1>
        <form action="{{ route('admin.opname.update', $opname->id_opname) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Pengadaan</label>
                <select name="id_pengadaan" class="form-control">
                    @foreach($pengadaans as $pengadaan)
                        <option value="{{ $pengadaan->id_pengadaan }}" 
                            {{ $pengadaan->id_pengadaan == $opname->id_pengadaan ? 'selected' : '' }}>
                            {{ $pengadaan->masterBarang->nama_barang }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Opname</label>
                <input type="date" name="tgl_opname" class="form-control" 
                    value="{{ old('tgl_opname', $opname->tgl_opname) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Kondisi</label>
                <input type="text" name="kondisi" class="form-control" 
                    value="{{ old('kondisi', $opname->kondisi) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control">{{ old('keterangan', $opname->keterangan) }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
