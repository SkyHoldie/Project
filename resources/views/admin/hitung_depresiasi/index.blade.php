@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Daftar Hitung Depresiasi</h1>
    <a href="{{ route('admin.hitung_depresiasi.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Hitung Depresiasi
    </a>

    @if ($depresiasiItems->isEmpty())
        <div class="alert alert-warning">Tidak ada data depresiasi.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table table-bordered">
                    <tr>
                        <th>Kode Pengadaan</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Hitung</th>
                        <th>Durasi (Bulan)</th>
                        <th>Nilai Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($depresiasiItems as $depresiasi)
                    <tr>
                        <td>{{ optional($depresiasi->pengadaan)->kode_pengadaan ?? '-' }}</td>
                        <td>{{ optional($depresiasi->pengadaan->masterBarang)->nama_barang ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($depresiasi->tgl_hitung_depresiasi)->format('d-m-Y') }}</td>
                        <td>
                            {{-- Menghitung lama depresiasi dalam bulan --}}
                            @php
                                $lama_depresiasi_tahun = optional($depresiasi->pengadaan->depresiasi)->lama_depresiasi;
                                $lama_depresiasi_bulan = $lama_depresiasi_tahun * 12; // Ubah tahun ke bulan
                            @endphp
                            {{ $lama_depresiasi_bulan ?? '-' }} bulan
                        </td>
                        <td>Rp {{ number_format($depresiasi->nilai_barang, 0, ',', '.') }}</td>
                        <td>
                            @if($depresiasi->nilai_barang > 0)
                                <a href="{{ route('admin.hitung_depresiasi.edit', $depresiasi->id_hitung_depresiasi) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="{{ route('admin.hitung_depresiasi.show', $depresiasi->id_pengadaan) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <form action="{{ route('admin.hitung_depresiasi.destroy', $depresiasi->id_hitung_depresiasi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            @else
                                <span class="badge bg-secondary">Depresiasi Selesai</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
