<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Tampilkan semua data buku
     */
    public function index()
    {
        // Eager load kategori biar query lebih efisien
        $buku = Buku::with('kategori')->get();

        return view('admin.data-buku', compact('buku'));
    }

    /**
     * Form tambah buku
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.data-buku-create', compact('kategori'));
    }

    /**
     * Simpan buku baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku'   => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'pengarang'    => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'kategori_id'  => 'required|exists:kategoris,id',
            'cover_buku'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Generate kode buku unik
        $kode_buku = 'BK-' . strtoupper(uniqid());

        // Upload cover kalau ada
        $coverPath = null;
        if ($request->hasFile('cover_buku')) {
            $coverPath = $request->file('cover_buku')->store('covers', 'public');
        }

        Buku::create([
            'kode_buku'    => $kode_buku,
            'judul_buku'   => $request->judul_buku,
            'penerbit'     => $request->penerbit,
            'pengarang'    => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'kategori_id'  => $request->kategori_id,
            'cover_buku'   => $coverPath,
        ]);

        return redirect()->route('admin.data-buku.index')
                         ->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail buku
     */
    public function show($id)
    {
        $buku = Buku::with('kategori')->findOrFail($id);
        return view('admin.data-buku-show', compact('buku'));
    }

    /**
     * Form edit buku
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();

        return view('admin.data-buku-edit', compact('buku', 'kategori'));
    }

    /**
     * Update data buku
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_buku'   => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'pengarang'    => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'kategori_id'  => 'required|exists:kategoris,id',
            'cover_buku'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $buku = Buku::findOrFail($id);

        // Upload cover baru kalau ada
        if ($request->hasFile('cover_buku')) {
            $coverPath = $request->file('cover_buku')->store('covers', 'public');
            $buku->cover_buku = $coverPath;
        }

        $buku->update([
            'judul_buku'   => $request->judul_buku,
            'penerbit'     => $request->penerbit,
            'pengarang'    => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'kategori_id'  => $request->kategori_id,
            'cover_buku'   => $buku->cover_buku,
        ]);

        return redirect()->route('admin.data-buku.index')
                         ->with('success', 'Data buku berhasil diperbarui!');
    }

    /**
     * Hapus buku
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('admin.data-buku.index')
                         ->with('success', 'Buku berhasil dihapus!');
    }
}
