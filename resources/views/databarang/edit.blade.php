@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
    <h1 class="mt-4">Edit Barang</h1>

    <!-- Menampilkan pesan error jika ada masalah global (seperti ID barang tidak ditemukan) -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form untuk mengedit barang -->
    <form action="{{ route('databarang.update', $barang->id_barang) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        <!-- ID Barang -->
        <div class="form-group">
            <label for="id_barang">ID Barang</label>
            <input type="text" name="id_barang" id="id_barang" class="form-control" value="{{ old('id_barang', $barang->id_barang) }}" required>
            @error('id_barang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nama Barang -->
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
            @error('nama_barang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Harga -->
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" step="0.01" value="{{ old('harga', $barang->harga) }}" required>
            @error('harga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Stok -->
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok', $barang->stok) }}" required>
            @error('stok')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Foto Barang -->
        <div class="form-group">
            <label for="foto">Foto Barang</label>
            <input type="file" name="foto" id="foto" class="form-control">
            @if ($barang->foto)
                <p>Foto Saat Ini:</p>
                <img src="{{ asset($barang->foto) }}" width="100" class="img-fluid">
            @endif
            @error('foto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol untuk submit -->
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('databarang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection
