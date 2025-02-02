@extends('layouts.user')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-3">Daftar Hitung Depresiasi</h1>


        @if ($depresiasiItems->isEmpty())
            <div class="alert alert-warning">Tidak ada data depresiasi.</div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Kode Pengadaan</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Hitung</th>
                            <th>Durasi (Bulan)</th>
                            <th>Nilai Barang</th>
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
                                        $lama_depresiasi_tahun = optional($depresiasi->pengadaan->depresiasi)
                                            ->lama_depresiasi;
                                        $lama_depresiasi_bulan = $lama_depresiasi_tahun * 12; // Ubah tahun ke bulan
                                    @endphp
                                    {{ $lama_depresiasi_bulan ?? '-' }} bulan
                                </td>
                                <td>Rp {{ number_format($depresiasi->nilai_barang, 0, ',', '.') }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
