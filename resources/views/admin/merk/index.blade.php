@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Merk</h1>

    <a href="{{ route('admin.merk.create') }}" class="btn btn-primary mb-3">Tambah Merk</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Merk</th>
                <th>keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($merks as $id)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $id->merk }}</td>
                    <td>{{ $id->keterangan }}</td>
                    <td>
                        <a href="{{ route('admin.merk.edit', $id->id_merk) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.merk.destroy', $id->id_merk) }}" method="POST" class="d-inline">
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
