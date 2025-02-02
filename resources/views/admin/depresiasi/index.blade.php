@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Halaman Depresiasi</h1>
        <a href="{{ route('admin.depresiasi.create') }}" class="btn btn-primary mb-3">Tambah Depresiasi</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Lama Depresiasi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($depresiasi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->lama_depresiasi }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <a href="{{ route('admin.depresiasi.edit', $item->id_depresiasi ) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.depresiasi.destroy', $item->id_depresiasi) }}"
                                method="POST" class="d-inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus distributor ini?')">
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
