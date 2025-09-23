<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');   // contoh: Novel, Biografi, Komedi
            $table->string('jenis');  // contoh: Fiksi, Non-Fiksi
            $table->timestamps();
        });

        // Tambahin kolom kategori_id ke tabel buku
        Schema::table('buku', function (Blueprint $table) {
            $table->unsignedBigInteger('kategori_id')->nullable()->after('pengarang');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('buku', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });

        Schema::dropIfExists('kategoris');
    }
};
