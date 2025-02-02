@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Sub Kategori Asset</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama Sub Kategori: {{ $subKategoriAsset->nama_sub_kategori }}</h5>
            <p class="card-text">Kategori: {{ $subKategoriAsset->kategori->nama_kategori ?? '-' }}</p>
        </div>
    </div>
    <a href="{{ route('sub_kategori_asset.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
