<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pm_kka_pengisians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolah_id')->nullable()->constrained('sekolahs')->nullOnDelete();
            
            // Identitas
            $table->string('nama_guru');
            $table->string('nama_sekolah');
            $table->string('kelas_fase')->nullable();
            $table->string('topik_materi')->nullable();
            $table->string('nama_petugas_monev');
            $table->string('jabatan_penilai');
            $table->date('tanggal_monev');
            $table->text('sumber_data_bukti')->nullable();

            // Level 1 - Reaction (29 Indikator)
            $table->json('level_1_jawaban')->nullable();

            // Level 2 - Learning (25 Indikator + Rubrik)
            $table->json('level_2_jawaban')->nullable();

            // Rekapitulasi & Catatan Kualitatif
            $table->text('catatan_kekuatan')->nullable();
            $table->text('catatan_pengembangan')->nullable();
            $table->text('rekomendasi')->nullable();
            $table->text('catatan_lainnya')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pm_kka_pengisians');
    }
};