@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Daftar Hitung Depresiasi</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pengadaan</th>
                    <th>Tanggal</th>
                    <th>Bulan</th>
                    <th>Durasi</th>
                    <th>Nilai</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($hitungDepresiasis as $item)
                    <tr>
                        <td>{{ $item->id_hitung_depresiasi }}</td>
                        <td>{{ $item->pengadaan->kode_pengadaan }}</td>
                        <td>{{ $item->tgl_hitung_depresiasi }}</td>
                        <td>{{ $item->bulan }}</td>
                        <td>{{ $item->durasi }}</td>
                        <td>{{ $item->nilai_barang }}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection