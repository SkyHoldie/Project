@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Hitung Depresiasi</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.hitung_depresiasi.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label"><strong>Pilih Pengadaan</strong></label>
                    <select name="id_pengadaan" class="form-control" required>
                        <option value="">-- Pilih Pengadaan --</option>
                        @foreach($pengadaan as $item)
                            <option value="{{ $item->id_pengadaan }}">
                                {{ $item->masterBarang->nama_barang }} - Rp {{ number_format($item->harga_barang, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label"><strong>Tanggal Hitung Depresiasi</strong></label>
                    <input type="date" name="tgl_hitung_depresiasi" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.hitung_depresiasi.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
