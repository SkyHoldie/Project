@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Distributor</h1>
        <a href="{{ route('admin.distributor.create') }}" class="btn btn-primary mb-3">Tambah Distributor</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

         <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Distributor</th>
                    <th>Alamat</th>
                    <th>No_Telp</th>
                    <th>Email</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($distributors as $distributor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $distributor->nama_distributor }}</td>
                        <td>{{ $distributor->alamat }}</td>
                        <td>{{ $distributor->no_telp }}</td>
                        <td>{{ $distributor->email }}</td>
                        <td>{{ $distributor->keterangan }}</td>
                        <td>
                            <a href="{{ route('admin.distributor.edit', $distributor->id_distributor) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.distributor.destroy', $distributor->id_distributor) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus distributor ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
