@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('content')
<div class="flex justify-between mb-6">
    <h1 class="text-2xl font-bold text-blue-700">📂 Daftar Kategori</h1>
    <a href="{{ route('admin.kategori.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        ➕ Tambah Kategori
    </a>
</div>

<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <table class="min-w-full border border-gray-200">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Nama</th>
                <th class="px-4 py-2 border">Jenis</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategori as $kat)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $kat->id }}</td>
                    <td class="px-4 py-2 border">{{ $kat->nama }}</td>
                    <td class="px-4 py-2 border">{{ $kat->jenis }}</td>
                    <td class="px-4 py-2 border flex gap-2">
                        <a href="{{ route('admin.kategori.edit', $kat->id) }}" 
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('admin.kategori.destroy', $kat->id) }}" method="POST" 
                              onsubmit="return confirm('Yakin hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">Belum ada kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
