<?php

/**
 * Author: Hadisty Qurratu'Ain
 * Description: Controller untuk mengelola data barang dalam aplikasi. 
 *              Controller ini menangani operasi CRUD untuk data barang
 * Date: 15 November 2024
 * Version: 1.0
 */

namespace App\Http\Controllers;

use App\Models\DataBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DataBarangController extends Controller
{
    // Menampilkan semua barang
    public function index()
    {
        $barang = DataBarang::all();
        return view('databarang.index', compact('barang')); 
    }

    // Menampilkan form untuk menambah barang
    public function create()
    {
        return view('databarang.create');
    }

    // Menyimpan data barang baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_barang' => 'required|unique:data_barang,id_barang',
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Path buat foto 
        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoName = time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $fotoPath = public_path('foto') . '/' . $fotoName;
            $request->file('foto')->move(public_path('foto'), $fotoName);
            $fotoPath = 'foto/' . $fotoName;
        }

        // Menyimpan barang ke database
        DataBarang::create([
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('databarang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit barang
    public function edit($id)
    {
        try {
            $barang = DataBarang::findOrFail($id); // Mengambil data barang berdasarkan ID
            return view('databarang.edit', compact('barang')); // Mengarahkan ke 'databarang.edit'
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Barang dengan ID ' . $id . ' tidak ditemukan!');
            return redirect()->route('databarang.index');
        }
    }

    // Memperbarui data barang
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_barang' => 'required|unique:data_barang,id_barang,' . $id . ',id_barang',  // Perbaiki validasi untuk mengecualikan ID yang sedang diedit
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Menemukan barang berdasarkan ID
        try {
            $barang = DataBarang::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Barang dengan ID ' . $id . ' tidak ditemukan!');
            return redirect()->route('databarang.index');
        }

        // Mengelola foto jika diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($barang->foto && file_exists(public_path($barang->foto))) {
                unlink(public_path($barang->foto));  // Menghapus foto lama
            }

            // Menyimpan foto baru ke folder public/foto
            $fotoName = time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $fotoPath = 'foto/' . $fotoName;
            $request->file('foto')->move(public_path('foto'), $fotoName);

            // Update foto path di database
            $barang->foto = $fotoPath;
        }

        // Memperbarui data barang tanpa mengubah foto jika foto tidak diupload
        $barang->update([
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('databarang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    // Menghapus data barang
    public function destroy($id)
    {
        try {
            $barang = DataBarang::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Barang dengan ID ' . $id . ' tidak ditemukan!');
            return redirect()->route('databarang.index');
        }

        if ($barang->foto && file_exists(public_path($barang->foto))) {
            unlink(public_path($barang->foto)); 
        }

        $barang->delete();

        return redirect()->route('databarang.index')->with('success', 'Barang berhasil dihapus!');
    }

    // Menampilkan detail barang
    public function show($id)
    {
        try {
            $barang = DataBarang::findOrFail($id);
            return view('databarang.show', compact('barang')); // Mengarahkan ke 'databarang.show'
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Barang dengan ID ' . $id . ' tidak ditemukan!');
            return redirect()->route('databarang.index');
        }
    }
}
