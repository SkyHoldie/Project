@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Pengadaan</h1>
        <div class="card p-4 shadow-sm">
            <form action="{{ route('admin.pengadaan.update', $pengadaan->id_pengadaan) }}" method="POST">
                @csrf
                @method('PUT')



                

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="harga_barang" class="form-label">Harga Barang</label>
                        <input type="number" class="form-control" id="harga_barang" name="harga_barang"
                            value="{{ old('harga_barang', $pengadaan->harga_barang) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="id_depresiasi" class="form-label">Nilai Barang</label>
                        <select name="id_depresiasi" id="id_depresiasi" class="form-control" required>
                            <option value="">Pilih Lama Depresiasi</option>
                            @foreach ($depresiasis as $depresiasi)
                                <option value="{{ $depresiasi->id_depresiasi }}"   {{ $pengadaan->id_depresiasi == $depresiasi->id_depresiasi ? 'selected' : '' }}>{{ $depresiasi->lama_depresiasi }} Tahun</option>
                            @endforeach
                        </select>
                       
                    </div>
                   
                </div>

                

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2">Update</button>
                    <a href="{{ route('admin.pengadaan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
