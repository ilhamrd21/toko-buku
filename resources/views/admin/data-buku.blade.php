@extends('layouts.admin')

@section('title', 'Data Buku')

@section('content')
<div x-data="{ open: false, selected: null }">
    <!-- Header -->
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">
            📚 Data Buku
        </h1>
        <a href="{{ route('admin.data-buku.create') }}" 
           class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-xl shadow-lg hover:scale-105 transform transition duration-300 font-semibold">
            ➕ Tambah Buku
        </a>
    </div>

    <!-- Grid Buku -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($buku as $item)
            <div class="relative group">
                <div @click="open = true; selected = {{ $item->toJson() }}"
                     class="cursor-pointer bg-white shadow-lg rounded-2xl overflow-hidden border border-gray-200 transition transform hover:-translate-y-2 hover:shadow-2xl duration-300">
                    
                    @if($item->cover_buku)
                        <img src="{{ asset('storage/' . $item->cover_buku) }}" 
                             class="w-full h-56 object-cover rounded-t-2xl">
                    @else
                        <div class="w-full h-56 flex items-center justify-center bg-gray-100 text-gray-500">
                            No Cover
                        </div>
                    @endif

                    <div class="p-5">
                        <h3 class="font-bold text-lg text-gray-900 mb-1 truncate">{{ $item->judul_buku }}</h3>
                        <p class="text-sm text-gray-700">{{ $item->pengarang }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ $item->kategori->nama ?? '-' }}</p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada data buku.</p>
        @endforelse
    </div>

    <!-- 🌟 Modal Detail Buku -->
    <div x-show="open" 
         class="fixed inset-0 flex items-center justify-center bg-black/50 z-50 p-4" 
         x-transition>
        <div class="bg-white p-8 rounded-2xl shadow-2xl border border-gray-200 w-[90%] max-w-3xl relative"
             @click.away="open = false">

            <!-- Tombol close -->
            <button @click="open = false" 
                    class="absolute top-4 right-4 text-gray-500 hover:text-red-500 text-2xl">
                ✖
            </button>

            <div class="flex flex-col md:flex-row gap-8">
                <template x-if="selected?.cover_buku">
                    <img :src="'/storage/' + selected.cover_buku" 
                         class="w-52 h-72 object-cover rounded-xl shadow-md">
                </template>
                <template x-if="!selected?.cover_buku">
                    <div class="w-52 h-72 flex items-center justify-center bg-gray-200 text-gray-500 rounded-xl">
                        No Cover
                    </div>
                </template>

                <div class="flex-1">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-4 leading-tight" x-text="selected?.judul_buku"></h2>
                    <div class="space-y-3 text-gray-800 text-base">
                        <p><span class="font-semibold">✍ Pengarang:</span> <span x-text="selected?.pengarang"></span></p>
                        <p><span class="font-semibold">🏢 Penerbit:</span> <span x-text="selected?.penerbit"></span></p>
                        <p><span class="font-semibold">📅 Tahun Terbit:</span> <span x-text="selected?.tahun_terbit"></span></p>
                        <p><span class="font-semibold">🏷 Kategori:</span> 
                            <span x-text="selected?.kategori?.nama ?? '-'"></span>
                            (<span x-text="selected?.kategori?.jenis ?? '-'"></span>)
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex gap-4">
                <a :href="`/admin/data-buku/${selected?.id}/edit`" 
                   class="px-5 py-2.5 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition font-semibold">
                   ✏ Edit
                </a>
                <form :action="`/admin/data-buku/${selected?.id}`" method="POST" 
                      onsubmit="return confirm('Yakin hapus buku ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-5 py-2.5 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition font-semibold">
                        🗑 Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
