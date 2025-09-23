@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-bold mb-6">Edit Kategori</h2>

    <form action="{{ route('admin.kategori.update', $kategori->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Nama Kategori</label>
            <input type="text" name="nama" value="{{ $kategori->nama }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Jenis</label>
            <select name="jenis" class="w-full border rounded px-3 py-2" required>
                <option value="Fiksi" {{ $kategori->jenis == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                <option value="Non-Fiksi" {{ $kategori->jenis == 'Non-Fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
            </select>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.kategori.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Kembali
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
