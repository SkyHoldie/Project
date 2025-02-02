<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data Asset</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h2>Daftar Data Asset</h2>

    <div class="accordion" id="assetAccordion">
        <!-- Kategori Asset -->
        <div class="card">
            <div class="card-header" id="headingKategoriAsset">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseKategoriAsset" aria-expanded="true" aria-controls="collapseKategoriAsset">
                        Kategori Asset
                    </button>
                </h2>
            </div>

            <div id="collapseKategoriAsset" class="collapse" aria-labelledby="headingKategoriAsset" data-parent="#assetAccordion">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Kategori Asset</th>
                                <th>Kategori Asset</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoriAssets as $kategori)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kategori->kode_kategori_asset }}</td>
                                    <td>{{ $kategori->kategori_asset }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Merk -->
        <div class="card">
            <div class="card-header" id="headingMerk">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseMerk" aria-expanded="false" aria-controls="collapseMerk">
                        Merk
                    </button>
                </h2>
            </div>
            <div id="collapseMerk" class="collapse" aria-labelledby="headingMerk" data-parent="#assetAccordion">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Merk</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($merks as $merk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $merk->merk }}</td>
                                    <td>{{ $merk->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Depresiasi -->
        <div class="card">
            <div class="card-header" id="headingDepresiasi">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseDepresiasi" aria-expanded="false" aria-controls="collapseDepresiasi">
                        Depresiasi
                    </button>
                </h2>
            </div>
            <div id="collapseDepresiasi" class="collapse" aria-labelledby="headingDepresiasi" data-parent="#assetAccordion">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Lama Depresiasi</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($depresiasis as $depresiasi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $depresiasi->lama_depresiasi }}</td>
                                    <td>{{ $depresiasi->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sub Kategori Asset -->
        <div class="card">
            <div class="card-header" id="headingSubKategoriAsset">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSubKategoriAsset" aria-expanded="false" aria-controls="collapseSubKategoriAsset">
                        Sub Kategori Asset
                    </button>
                </h2>
            </div>
            <div id="collapseSubKategoriAsset" class="collapse" aria-labelledby="headingSubKategoriAsset" data-parent="#assetAccordion">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Sub Kategori Asset</th>
                                <th>Sub Kategori Asset</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subKategoriAssets as $subKategori)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subKategori->kode_sub_kategori_asset }}</td>
                                    <td>{{ $subKategori->sub_kategori_asset }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Satuan -->
        <div class="card">
            <div class="card-header" id="headingSatuan">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSatuan" aria-expanded="false" aria-controls="collapseSatuan">
                        Satuan
                    </button>
                </h2>
            </div>
            <div id="collapseSatuan" class="collapse" aria-labelledby="headingSatuan" data-parent="#assetAccordion">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($satuans as $satuan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $satuan->satuan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Distributor -->
        <div class="card">
            <div class="card-header" id="headingDistributor">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseDistributor" aria-expanded="false" aria-controls="collapseDistributor">
                        Distributor
                    </button>
                </h2>
            </div>
            <div id="collapseDistributor" class="collapse" aria-labelledby="headingDistributor" data-parent="#assetAccordion">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Distributor</th>
                                <th>Alamat</th>
                                <th>No. Telp</th>
                                <th>Email</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($distributors as $distributor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $distributor->nama_distributor }}</td>
                                    <td>{{ $distributor->alamat }}</td>
                                    <td>{{ $distributor->no_telp }}</td>
                                    <td>{{ $distributor->email }}</td>
                                    <td>{{ $distributor->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Master Barang -->
        <div class="card">
            <div class="card-header" id="headingMasterBarang">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseMasterBarang" aria-expanded="false" aria-controls="collapseMasterBarang">
                        Master Barang
                    </button>
                </h2>
            </div>
            <div id="collapseMasterBarang" class="collapse" aria-labelledby="headingMasterBarang" data-parent="#assetAccordion">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Spesifikasi Teknis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($masterBarangs as $barang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->kode_barang }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>{{ $barang->spesifikasi_teknis }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
