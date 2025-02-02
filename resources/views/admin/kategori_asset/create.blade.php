@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary">Tambah Kategori Asset</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.kategori_asset.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        <div class="mb-4">
            <label for="kode_kategori_asset" class="form-label">Kode Kategori Asset</label>
            <input type="text" name="kode_kategori_asset" id="kode_kategori_asset" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="kategori_asset" class="form-label">Nama Kategori Asset</label>
            <input type="text" name="kategori_asset" id="kategori_asset" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-gradient">Simpan</button>
            <a href="{{ route('admin.kategori_asset.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection

<style>
    /* Styling untuk form */
    .form-control {
        border-radius: 12px;
        box-shadow: none;
        border: 1px solid #ced4da;
    }

    .form-label {
        font-weight: bold;
        color: #495057;
    }

    /* Tombol simpan dengan gradien */
    .btn-gradient {
        background: linear-gradient(45deg, #4e73df, #1cc88a);
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 25px;
    }

    .btn-gradient:hover {
        background: linear-gradient(45deg, #2e59d9, #17a673);
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
        font-size: 1rem;
        padding: 10px 20px;
        border-radius: 25px;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    /* Styling form container */
    .form-container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .container {
        max-width: 800px;
    }
</style>