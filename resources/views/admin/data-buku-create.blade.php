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
            <select name="kategori" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Fiksi">Fiksi</option>
                <option value="Non-Fiksi">Non-Fiksi</option>
                <option value="Cerita Anak">Cerita Anak</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Sejarah">Sejarah</option>
                <option value="Novel">Novel</option>
                <option value="Biografi">Biografi</option>
                <option value="Drama">Drama</option>
                <option value="Komedi">Komedi</option>
                <option value="Horor">Horor</option>
                <option value="Thriller">Thriller</option>
                <option value="Fantasi">Fantasi</option>
                <option value="Misteri">Misteri</option>
                <option value="Romance">Romance</option>
                <option value="Sci-Fi">Sci-Fi</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Adventure">Adventure</option>
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
