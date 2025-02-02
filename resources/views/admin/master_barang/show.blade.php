<!-- resources/views/admin/master_barang/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Detail Barang</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $masterBarang->id_barang }}</td>
        </tr>
        <tr>
            <th>Kode Barang</th>
            <td>{{ $masterBarang->kode_barang }}</td>
        </tr>
        <tr>
            <th>Nama Barang</th>
            <td>{{ $masterBarang->nama_barang }}</td>
        </tr>
        <tr>
            <th>Spesifikasi</th>
            <td>{{ $masterBarang->spesifikasi_teknis }}</td>
        </tr>
    </table>
@endsection
