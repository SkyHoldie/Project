@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Daftar Opname</h1>
        <a href="{{ route('admin.opname.create') }}" class="btn btn-primary">Tambah Opname</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pengadaan</th>
                    <th>Tanggal Opname</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($opnames as $opname)
                    <tr>
                        <td>{{ $opname->id_opname }}</td>
                        <td>{{ $opname->pengadaan->kode_pengadaan }}</td>
                        <td>{{ $opname->tgl_opname }}</td>
                        <td>{{ $opname->kondisi }}</td>
                        <td>{{ $opname->keterangan }}</td>
                        <td><a href="{{ route('admin.opname.edit', $opname->id_opname) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.opname.destroy', $opname->id_opname) }}" method="POST"
                                style="display:inline;">
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
