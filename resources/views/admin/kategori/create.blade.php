@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-bold mb-6">Tambah Kategori</h2>

    <form action="{{ route('admin.kategori.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Nama Kategori</label>
            <input type="text" name="nama" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Jenis</label>
            <select name="jenis" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="Fiksi">Fiksi</option>
                <option value="Non-Fiksi">Non-Fiksi</option>
            </select>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.kategori.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Kembali
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
