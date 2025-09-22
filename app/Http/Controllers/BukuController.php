<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Tampilkan semua data buku
    public function index()
    {
        $buku = Buku::all();
        return view('admin.data-buku', compact('buku'));
    }

    // Form tambah buku
    public function create()
    {
        return view('admin.data-buku-create');
    }

    // Simpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku'   => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'pengarang'    => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'kategori'     => 'required|string', 
            'cover_buku'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Generate kode buku otomatis
        $kode_buku = 'BK-' . strtoupper(uniqid());

        // Upload cover (jika ada)
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
            'kategori'     => $request->kategori,
            'cover_buku'   => $coverPath,
        ]);

        return redirect()->route('admin.data-buku.index')
                         ->with('success', 'Buku berhasil ditambahkan!');
    }

    // Form edit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('admin.data-buku-edit', compact('buku'));
    }

    // Update data buku
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_buku'   => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'pengarang'    => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'kategori'     => 'required|string',
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
            'kategori'     => $request->kategori,
            'cover_buku'   => $buku->cover_buku,
        ]);

        return redirect()->route('admin.data-buku.index')
                         ->with('success', 'Data buku berhasil diperbarui!');
    }

    // Hapus buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('admin.data-buku.index')
                         ->with('success', 'Buku berhasil dihapus!');
    }
}
