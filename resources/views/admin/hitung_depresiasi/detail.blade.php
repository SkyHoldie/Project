@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Depresiasi - {{ $pengadaan->nama_barang }}</h1>
    <a href="{{ route('admin.hitung_depresiasi.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <table class="table">
        <tr>
            <th>Nama Barang</th>
            <td>{{ $pengadaan->nama_barang }}</td>
        </tr>
        <tr>
            <th>No Invoice</th>
            <td>{{ $pengadaan->no_invoice }}</td>
        </tr>
        <tr>
            <th>Tanggal Pengadaan</th>
            <td>{{ \Carbon\Carbon::parse($pengadaan->tgl_pengadaan)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>Harga Barang</th>
            <td>Rp {{ number_format($pengadaan->harga_barang, 0, ',', '.') }}</td>
        </tr>
    </table>

    <h3>Perhitungan Depresiasi</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Nilai Barang</th>
                <th>Nilai Setelah Depresiasi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $harga_awal = $pengadaan->harga_barang;
                $lama_depresiasi_tahun = optional($pengadaan->depresiasi)->lama_depresiasi;
                $lama_depresiasi_bulan = $lama_depresiasi_tahun * 12; // Ubah tahun ke bulan
                $penyusutan_per_bulan = $harga_awal / $lama_depresiasi_bulan; // Hitung depresiasi per bulan
                $nilai_barang = $harga_awal;
                $bulan_counter = 1; // Mulai bulan pertama
            @endphp

            @while ($nilai_barang > 0 && $bulan_counter <= $lama_depresiasi_bulan)
                @php
                    // Mengurangi nilai barang setiap bulan
                    $nilai_barang -= $penyusutan_per_bulan;
                @endphp
                <tr>
                    <td>{{ \Carbon\Carbon::parse($pengadaan->tgl_pengadaan)->addMonths($bulan_counter - 1)->format('F Y') }}</td>
                    <td>Rp {{ number_format($harga_awal, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format(max(0, $nilai_barang), 0, ',', '.') }}</td>
                </tr>
                @php
                    $bulan_counter++;
                @endphp
            @endwhile
        </tbody>
    </table>
</div>
@endsection
