@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="my-4 text-center text-primary">Daftar Kategori Asset</h1>

    <!-- Menampilkan pesan error atau success -->
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


    <a href="{{ route('admin.kategori_asset.create') }}" class="btn btn-gradient mb-3 d-block mx-auto">Tambah Kategori
        Asset</a>

    <!-- Tabel Kategori Asset -->
    <div class="table-responsive shadow-lg rounded-lg overflow-hidden">
        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori_assets as $kategori)
                    <tr>
                        <td>{{ $kategori->kode_kategori_asset }}</td>
                        <td>{{ $kategori->kategori_asset }}</td>
                        <td>
                            <a href="{{ route('admin.kategori_asset.edit', $kategori->id_kategori_asset) }}"
                                class="btn btn-warning btn-sm rounded-pill">Edit</a>

                            <!-- Form Hapus -->
                            <form action="{{ route('admin.kategori_asset.destroy', $kategori->id_kategori_asset) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-pill"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

<!-- SweetAlert Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Notifikasi Jika Ada Pesan -->
<script>
    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "{{ session('error') }}",
        });
    @endif

    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
        });
    @endif
</script>





<style>
    /* CSS untuk tombol gradient */
    .btn-gradient {
        background: linear-gradient(45deg, #4e73df, #1cc88a);
        color: white;
        border: none;
    }

    .btn-gradient:hover {
        background: linear-gradient(45deg, #2e59d9, #17a673);
    }

    /* Menambahkan efek bayangan pada tabel */
    .table-responsive {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    /* Mengubah warna latar belakang header tabel */
    .thead-light th {
        background-color: #007bff;
        color: white;
        text-align: center;
        font-weight: bold;
    }

    /* Efek hover pada baris tabel */
    tbody tr:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

    /* Membuat tombol lebih bulat */
    .btn-sm {
        font-size: 0.85rem;
        padding: 6px 12px;
    }

    /* Rounded button style */
    .btn-rounded {
        border-radius: 50px;
    }

    /* Styling untuk tampilan tombol 'Tambah Kategori Asset' */
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
    }

    /* Hover effect for 'Tambah Kategori Asset' button */
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>