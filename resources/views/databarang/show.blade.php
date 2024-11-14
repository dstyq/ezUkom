@extends('layouts.app')

@section('title', 'Detail Barang')

@section('content')
    <h1>Detail Barang</h1>
    <div class="card">
        <div class="card-header">
            {{ $barang->nama_barang }}
        </div>
        <div class="card-body">
            <p><strong>ID Barang:</strong> {{ $barang->id_barang }}</p>
            <p><strong>Harga:</strong> {{ number_format($barang->harga, 2, ',', '.') }}</p>
            <p><strong>Stok:</strong> {{ $barang->stok }}</p>
            
            <!-- Menampilkan Foto Barang jika ada -->
            @if($barang->foto)
                <div class="mb-3">
                    <strong>Foto Barang:</strong><br>
                    <img src="{{ asset($barang->foto) }}" alt="Foto Barang" width="200"> <!-- Menampilkan foto barang -->
                </div>
            @else
                <p><strong>Foto:</strong> Tidak ada foto</p>
            @endif

            <!-- Tombol Edit dan Hapus -->
            <div class="mt-3">
                <a href="{{ route('databarang.edit', $barang->id_barang) }}" class="btn btn-warning">Edit</a>
                
                <!-- Route untuk hapus barang menggunakan method DELETE -->
                <form action="{{ route('databarang.destroy', $barang->id_barang) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</button>
                </form>

                <a href="{{ route('databarang.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection