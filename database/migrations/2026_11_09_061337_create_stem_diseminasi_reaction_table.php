<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stem_diseminasi_reaction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolah_id')->nullable()->constrained('sekolahs')->nullOnDelete();
            
            // Identitas
            $table->string('nama_responden');
            $table->string('asal_sekolah');
            $table->date('tanggal_pengisian');

            // Jawaban (Skor 1-4)
            $table->json('evaluasi_program')->nullable(); // Soal 1-5
            $table->json('sarana_prasarana')->nullable(); // Soal 6-10
            $table->json('fasilitator')->nullable(); // Soal 11-14
            $table->json('akses_lms')->nullable(); // Soal 15-20
            $table->json('bahan_kegiatan')->nullable(); // Soal 21-24
            $table->json('jangka_waktu')->nullable(); // Soal 25-26
            $table->json('layanan_menu')->nullable(); // Soal 27-29

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stem_diseminasi_reaction');
    }
};