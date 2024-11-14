@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
    <h1 class="mt-4">Tambah Barang</h1>

    <!-- Form untuk menambah barang -->
    <form action="{{ route('databarang.simpan') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- ID Barang -->
        <div class="form-group">
            <label for="id_barang">ID Barang</label>
            <input type="text" name="id_barang" id="id_barang" class="form-control" value="{{ old('id_barang') }}" required>
            @error('id_barang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nama Barang -->
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ old('nama_barang') }}" required>
            @error('nama_barang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Harga -->
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" step="0.01" value="{{ old('harga') }}" required>
            @error('harga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Stok -->
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok') }}" required>
            @error('stok')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Foto Barang -->
        <div class="form-group">
            <label for="foto">Foto Barang</label>
            <input type="file" name="foto" id="foto" class="form-control">
            @error('foto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol untuk submit -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('databarang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection