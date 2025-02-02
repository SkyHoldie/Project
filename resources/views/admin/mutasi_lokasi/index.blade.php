@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Mutasi Lokasi</h2>
    <a href="{{ route('admin.mutasi_lokasi.create') }}" class="btn btn-primary mb-3">Tambah Mutasi Lokasi</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lokasi</th>
                <th>Barang</th>
                <th>Flag Lokasi</th>
                <th>Flag Pindah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mutasiLokasis as $data)
                <tr>
                    <td>{{ $data->id_mutasi_lokasi }}</td>
                    <td>{{ $data->lokasi->nama_lokasi }}</td>
                    <td>{{ $data->pengadaan->masterBarang->nama_barang }}</td>
                    <td>{{ $data->flag_lokasi }}</td>
                    <td>{{ $data->flag_pindah }}</td>
                    <td>
                        <a href="{{ route('admin.mutasi_lokasi.edit', $data->id_mutasi_lokasi) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.mutasi_lokasi.destroy', $data->id_mutasi_lokasi) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
