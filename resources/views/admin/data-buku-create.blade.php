@extends('layouts.admin')

@section('title', 'Tambah Buku')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-bold mb-6">Tambah Buku</h2>

    <form action="{{ route('admin.data-buku.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Judul Buku</label>
            <input type="text" name="judul_buku" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Penerbit</label>
            <input type="text" name="penerbit" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Pengarang</label>
            <input type="text" name="pengarang" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Kategori</label>
            <select name="kategori_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->nama }} ({{ $kat->jenis }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700">Cover Buku (opsional)</label>
            <input type="file" name="cover_buku" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.data-buku.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Kembali
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
