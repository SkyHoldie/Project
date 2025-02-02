@extends('layouts.user')

@section('content')
    <h1>Daftar Pengadaan</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Barang</th>
                <th>Lama Depresiasi</th>
                <th>Depresiasi Barang</th> <!-- Tambahan baru -->
                <th>Nama Merek</th>
                <th>Nama Satuan</th>
                <th>Nama Sub-Kategori</th>
                <th>Nama Distributor</th>
                <th>Kode Pengadaan</th>
                <th>Nomor Invoice</th>
                <th>Nomor Seri Barang</th>
                <th>Tahun Produksi</th>
                <th>Tanggal Pengadaan</th>
                <th>Harga Barang</th>
                <th>Nilai Barang</th>
                <th>FB</th>
                <th>Keterangan</th>

            </tr>
        </thead>
        <tbody>
            @if ($pengadaan->isEmpty())
                <tr>
                    <td colspan="18" class="text-center">Belum ada data pengadaan.</td>
                </tr>
            @else
                @foreach ($pengadaan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->masterBarang->nama_barang ?? '-' }}</td>
                        <td>{{ $item->depresiasi->lama_depresiasi ?? '-' }} tahun</td>
                        <td>{{ number_format($item->nilai_depresiasi_terkini ?? '-', 0, ',', '.') }}</td>
                        <td>{{ $item->merk->merk ?? '-' }}</td>
                        <td>{{ $item->satuan->nama_satuan ?? '-' }}</td>
                        <td>{{ $item->subKategoriAsset->nama_sub_kategori ?? '-' }}</td>
                        <td>{{ $item->distributor->nama_distributor ?? '-' }}</td>
                        <td>{{ $item->kode_pengadaan }}</td>
                        <td>{{ $item->no_invoice }}</td>
                        <td>{{ $item->no_seri_barang }}</td>
                        <td>{{ $item->tahun_produksi }}</td>
                        <td>{{ $item->tgl_pengadaan }}</td>
                        <td>{{ number_format($item->harga_barang, 0, ',', '.') }}</td>
                        <td>{{ number_format($item->nilai_barang, 0, ',', '.') }}</td>
                        <td>{{ $item->fb == '1' ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ $item->keterangan ?? '-' }}</td>
                       
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
