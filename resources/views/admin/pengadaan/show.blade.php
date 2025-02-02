@extends('layouts.app')

@section('content')
    <h1>Detail Pengadaan</h1>

    <div class="card">
        <div class="card-header">
            <h4>{{ $pengadaan->nama_pengadaan }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Tanggal Pengadaan:</strong> {{ $pengadaan->tanggal_pengadaan }}</p>
            <a href="{{ route('admin.pengadaan.index') }}" class="btn btn-secondary">Kembali ke Daftar Pengadaan</a>
        </div>
    </div>
@endsection
