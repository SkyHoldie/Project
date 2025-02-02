@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Sub Kategori Asset</h1>
        <form action="{{ route('admin.sub_kategori_asset.update', $subKategoriAsset->id_sub_kategori_asset) }}"
            method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_sub_kategori" class="form-label">Nama Sub Kategori</label>
                <input type="text" class="form-control" id="nama_sub_kategori" name="nama_sub_kategori"
                    value="{{ old('nama_sub_kategori', $subKategoriAsset->nama_sub_kategori) }}" required>
            </div>

            <div class="mb-3">
                <label for="kode_sub_kategori_asset" class="form-label"> Sub Kategori</label>
                <input type="text" class="form-control" id="kode_sub_kategori_asset" name="kode_sub_kategori_asset"
                    value="{{ old('kode_sub_kategori_asset', $subKategoriAsset->kode_sub_kategori_asset) }}" required>
            </div>

            <div class="mb-3">
                <label for="id_kategori_asset" class="form-label">Kategori</label>
                <select class="form-control" id="id_kategori_asset" name="id_kategori_asset" required>
                    @foreach ($kategoriAssets as $kategori)
                        <option value="{{ $kategori->id_kategori_asset }}"
                            {{ $kategori->id_kategori_asset == $subKategoriAsset->kategori_id ? 'selected' : '' }}>
                            {{ $kategori->kategori_asset }} <!-- Sesuaikan dengan nama kategori yang tepat -->
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.sub_kategori_asset.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
