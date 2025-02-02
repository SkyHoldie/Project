@extends('layouts.user')

@section('content')
<div class="container mt-4">
    <h4>Daftar Opname</h4>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pengadaan</th>
                <th>Tanggal Opname</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach($opnames as $opname)
            <tr>
                <td>{{ $opname->id_opname }}</td>
                <td>{{ $opname->pengadaan->kode_pengadaan }} - {{ $opname->pengadaan->no_seri_barang }}</td>
                <td>{{ $opname->tgl_opname }}</td>
                <td>{{ $opname->kondisi }}</td>
                <td>{{ $opname->keterangan }}</td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
