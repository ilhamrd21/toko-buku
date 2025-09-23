@extends('layouts.admin')

@section('title', 'Kelola Data Buku')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold text-blue-700 flex items-center gap-2">
        📚 Data Buku
    </h1>
    <a href="{{ route('admin.data-buku.create') }}" 
       class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700">
        ➕ Tambah Buku
    </a>
</div>

<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <table class="min-w-full border border-gray-200">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Kode Buku</th>
                <th class="px-4 py-2 border">Judul Buku</th>
                <th class="px-4 py-2 border">Penerbit</th>
                <th class="px-4 py-2 border">Pengarang</th>
                <th class="px-4 py-2 border">Tahun Terbit</th>
                <th class="px-4 py-2 border">Kategori</th>
                <th class="px-4 py-2 border">Cover Buku</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($buku as $item)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border">{{ $item->id }}</td>
                    <td class="px-4 py-2 border">{{ $item->kode_buku }}</td>
                    <td class="px-4 py-2 border">{{ $item->judul_buku }}</td>
                    <td class="px-4 py-2 border">{{ $item->penerbit }}</td>
                    <td class="px-4 py-2 border">{{ $item->pengarang }}</td>
                    <td class="px-4 py-2 border">{{ $item->tahun_terbit }}</td>
                    <td class="px-4 py-2 border">
                        {{ $item->kategori ? $item->kategori->nama . ' (' . $item->kategori->jenis . ')' : '-' }}
                    </td>
                    <td class="px-4 py-2 border">
                        @if($item->cover_buku)
                            <img src="{{ asset('storage/' . $item->cover_buku) }}" alt="Cover" class="h-16 rounded">
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.data-buku.edit', $item->id) }}" 
                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Edit
                            </a>
                            <form action="{{ route('admin.data-buku.destroy', $item->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Yakin hapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4 text-gray-500">Belum ada data buku.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
