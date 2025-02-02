@extends('layouts.app')

@section('content')
    <h1>Tambah Pengadaan Baru</h1>

    <form action="{{ route('admin.pengadaan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_barang">Nama Barang</label>
            <select name="id_master_barang" id="id_barang" class="form-control" required>
                <option value="">Pilih Nama Barang</option>
                @foreach ($masters as $master)
                    <option value="{{ $master->id_barang }}">{{ $master->nama_barang }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label for="id_depresiasi">Lama Depresiasi (Tahun)</label>
            <select name="id_depresiasi" id="id_depresiasi" class="form-control" required>
                <option value="">Pilih Lama Depresiasi</option>
                @foreach ($depresiasis as $depresiasi)
                    <option value="{{ $depresiasi->id_depresiasi }}">{{ $depresiasi->lama_depresiasi }} Tahun</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_merk">Nama Merk</label>
            <select name="id_merk" id="id_merk" class="form-control" required>
                <option value="">Pilih Merk</option>
                @foreach ($merks as $merk)
                    <option value="{{ $merk->id_merk }}">{{ $merk->merk }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_satuan">Nama Satuan</label>
            <select name="id_satuan" id="id_satuan" class="form-control" required>
                <option value="">Pilih Nama Satuan</option>
                @foreach ($satuans as $satuan)
                    <option value="{{ $satuan->id_satuan }}">{{ $satuan->nama_satuan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_sub_kategori_asset">Nama Sub-Kategori Asset</label>
            <select name="id_sub_kategori_asset" id="id_sub_kategori_asset" class="form-control" required>
                <option value="">Pilih Sub-Kategori Asset</option>
                @foreach ($subs as $sub)
                    <option value="{{ $sub->id_sub_kategori_asset }}">{{ $sub->nama_sub_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_distributor">Nama Distributor</label>
            <select name="id_distributor" id="id_distributor" class="form-control" required>
                <option value="">Pilih Nama Distributor</option>
                @foreach ($distributors as $dis)
                    <option value="{{ $dis->id_distributor }}">{{ $dis->nama_distributor }}</option>
                @endforeach
            </select>
        </div>






        <div class="form-group">
            <label for="kode_pengadaan">Kode Pengadaan</label>
            <input type="text" class="form-control" id="kode_pengadaan" name="kode_pengadaan" required>
        </div>

        <div class="form-group">
            <label for="no_invoice">Nomor Invoice</label>
            <input type="text" class="form-control" id="no_invoice" name="no_invoice" required>
        </div>

        <div class="form-group">
            <label for="no_seri_barang">Nomor Seri Barang</label>
            <input type="text" class="form-control" id="no_seri_barang" name="no_seri_barang" required>
        </div>

        <div class="form-group">
            <label for="tahun_produksi">Tahun Produksi</label>
            <input type="number" class="form-control" id="tahun_produksi" name="tahun_produksi" required min="1900"
                max="{{ date('Y') }}">
        </div>

        <div class="form-group">
            <label for="tgl_pengadaan">Tanggal Pengadaan</label>
            <input type="date" class="form-control" id="tgl_pengadaan" name="tgl_pengadaan" required>
        </div>

        <div class="form-group">
            <label for="harga_barang">Harga Barang</label>
            <input type="number" class="form-control" id="harga_barang" name="harga_barang" required min="0">
        </div>

        <div class="form-group">
            <label for="nilai_barang">Nilai Barang</label>
            <input type="number" class="form-control" id="nilai_barang" name="nilai_barang" required min="0">
        </div>

        <div class="form-group">
            <label for="fb">FB</label>
            <select name="fb" id="fb" class="form-control" required>
                <option value="">Pilih FB</option>
                <option value="0">Tidak</option>
                <option value="1">Ya</option>
            </select>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="{{ route('admin.pengadaan.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
@endsection
