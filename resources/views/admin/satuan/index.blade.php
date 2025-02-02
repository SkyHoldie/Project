@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Satuan</h1>
    <a href="{{ route('admin.satuan.create') }}" class="btn btn-primary">Tambah Satuan</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($satuans as $satuan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $satuan->nama_satuan }}</td>
                <td>
                    <a href="{{ route('admin.satuan.edit', $satuan->id_satuan) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.satuan.destroy', $satuan->id_satuan) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
