@extends('layouts.app')

@section('content')
<h1>Daftar Barang</h1>
<a href="{{ route('databarang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($barang as $item)
    <tr>
        <td>{{ $item->id_barang }}</td>
        <td>{{ $item->nama_barang }}</td>
        <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
        <td>{{ $item->stok }}</td>
        <td>
            @if($item->foto)
                <img src="{{ asset($item->foto) }}" alt="Foto Barang" width="50" class="img-fluid">
            @else
                <span class="text-warning">Foto Belum Di-upload</span>
            @endif
        </td>
        <td>
            <a href="{{ route('databarang.show', $item->id_barang) }}" class="btn btn-info btn-sm">Detail</a>
            <a href="{{ route('databarang.edit', $item->id_barang) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('databarang.destroy', $item->id_barang) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

@endsection
