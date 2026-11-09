<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stem_fasda_evaluasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolah_id')->nullable()->constrained('sekolahs')->nullOnDelete();
            
            // Identitas Responden
            $table->string('nama_responden');
            $table->string('peran_responden')->default('Pendidik'); // Pendidik atau Murid
            $table->string('asal_sekolah');
            $table->string('kabupaten_kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->date('tanggal_pengisian');

            // Jawaban Pendidik (Skor 1-4, total 22 pertanyaan)
            $table->json('pendidik_perencanaan')->nullable(); // Soal 1-4
            $table->json('pendidik_pelaksanaan')->nullable(); // Soal 5-9
            $table->json('pendidik_evaluasi_refleksi')->nullable(); // Soal 10-13
            $table->json('pendidik_dampak_kualitas')->nullable(); // Soal 14-18
            $table->json('pendidik_pengembangan_profesional')->nullable(); // Soal 19-22
            $table->text('pendidik_catatan')->nullable(); // Global catatan (opsional)

            // Jawaban Murid (Skor 1-4, total 36 pertanyaan)
            $table->json('murid_iklim_kelas')->nullable(); // Soal 1-4
            $table->json('murid_lingkungan_suportif')->nullable(); // Soal 5-8
            $table->json('murid_kebebasan_eksplorasi')->nullable(); // Soal 9-12
            $table->json('murid_penghargaan_kolaboratif')->nullable(); // Soal 13-16
            $table->json('murid_keingintahuan')->nullable(); // Soal 17-20
            $table->json('murid_kepuasan')->nullable(); // Soal 21-24
            $table->json('murid_prinsip_mendalam')->nullable(); // Soal 25-29
            $table->json('murid_perkembangan')->nullable(); // Soal 30-33
            $table->json('murid_hasil_belajar')->nullable(); // Soal 34-36

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stem_fasda_evaluasi');
    }
};