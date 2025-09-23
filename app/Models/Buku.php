<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'kode_buku',
        'judul_buku',
        'penerbit',
        'pengarang',
        'kategori_id',
        'tahun_terbit',
        'cover_buku',
    ];

    // Relasi ke kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
