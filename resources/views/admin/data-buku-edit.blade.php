@extends('layouts.admin')

@section('title', 'Edit Buku')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h2 class="text-2xl font-bold mb-6">Edit Buku</h2>

    {{-- tampilkan error validasi kalau ada --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.data-buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data"
          class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Judul Buku</label>
            <input type="text" name="judul_buku" value="{{ old('judul_buku', $buku->judul_buku) }}" 
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Penerbit</label>
            <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" 
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Pengarang</label>
            <input type="text" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" 
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" 
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Kategori</label>
            <select name="kategori" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach (['Fiksi','Non-Fiksi','Cerita Anak','Pendidikan','Sejarah','Novel','Biografi','Drama','Komedi','Horor','Thriller','Fantasi','Misteri','Romance','Sci-Fi','Fantasy','Adventure'] as $kategori)
                    <option value="{{ $kategori }}" {{ $buku->kategori == $kategori ? 'selected' : '' }}>
                        {{ $kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700">Cover Buku</label>
            @if ($buku->cover_buku)
                <img src="{{ asset('storage/'.$buku->cover_buku) }}" width="100" class="mb-2 rounded">
            @endif
            <input type="file" name="cover_buku" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.data-buku.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Kembali
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
