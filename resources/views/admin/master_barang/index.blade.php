@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Master Barang</h1>
        <a href="{{ route('admin.master_barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>spesifikasi teknis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($masterBarangs as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->spesifikasi_teknis }}</td>

                        <td>
                            <a href="{{ route('admin.master_barang.edit', $barang->id_barang) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.master_barang.destroy', $barang->id_barang) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
