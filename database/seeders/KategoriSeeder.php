<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'Novel', 'jenis' => 'Fiksi'],
            ['nama' => 'Cerita Anak', 'jenis' => 'Fiksi'],
            ['nama' => 'Komedi', 'jenis' => 'Fiksi'],
            ['nama' => 'Biografi', 'jenis' => 'Non-Fiksi'],
            ['nama' => 'Sejarah', 'jenis' => 'Non-Fiksi'],
            ['nama' => 'Pendidikan', 'jenis' => 'Non-Fiksi'],
        ];

        foreach ($data as $item) {
            Kategori::create($item);
        }
    }
}
