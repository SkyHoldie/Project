@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Sub Kategori Asset</h1>
    <a href="{{ route('admin.sub_kategori_asset.create') }}" class="btn btn-primary mb-3">Tambah Sub Kategori Asset</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>kode sub kategori asset</th>
                <th>Nama Sub Kategori Asset</th>
                <th>Id Kategori Asset</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subKategoriAssets as $key => $subKategoriAsset)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subKategoriAsset->kode_sub_kategori_asset }}</td>
                    <td>{{ $subKategoriAsset->nama_sub_kategori }}</td>
                    <td>{{ $subKategoriAsset->id_kategori_asset }}</td>
                    <td class="d-flex">
                    <a href="{{ route('admin.sub_kategori_asset.edit', $subKategoriAsset->id_sub_kategori_asset) }}" class="btn btn-warning me-2">Edit</a>
                    <form action="{{ route('admin.sub_kategori_asset.update', $subKategoriAsset->id_sub_kategori_asset) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
