<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stem_diseminasi_monitoring', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolah_id')->nullable()->constrained('sekolahs')->nullOnDelete();
            
            // Identitas Supervisi
            $table->string('nama_satuan_pendidikan');
            $table->string('kab_kota');
            $table->string('nama_supervisor');
            $table->string('jabatan_instansi');
            $table->string('nama_fasilitator_daerah')->nullable();
            $table->date('tanggal_supervisi');
            $table->json('tahapan_dsupervisi')->nullable(); // Checkbox pilihan

            // Instrumen A (Fasilitator) - Skor 1-4
            $table->json('aspek_persiapan_pelaksanaan')->nullable(); // Soal 1-3
            $table->json('aspek_elaborasi_konsep')->nullable(); // Soal 4-8
            $table->json('aspek_refleksi_evaluasi')->nullable(); // Soal 9-11
            $table->json('aspek_ruang_karya')->nullable(); // Soal 12-15
            $table->json('aspek_keterlaksanaan')->nullable(); // Soal 16-18
            $table->json('aspek_kelengkapan_bukti')->nullable(); // Soal 19-21
            $table->json('aspek_desain_aktivitas')->nullable(); // Soal 22-25
            $table->json('aspek_implementasi_stem')->nullable(); // Soal 26-30
            $table->json('aspek_tindak_lanjut')->nullable(); // Soal 31-34
            $table->json('aspek_dampak_awal')->nullable(); // Soal 35-36

            // Instrumen B (Peserta) - Esai
            $table->text('wawancara_guru_1')->nullable();
            $table->text('wawancara_guru_2')->nullable();
            $table->text('wawancara_guru_3')->nullable();
            $table->text('wawancara_guru_4')->nullable();
            $table->text('wawancara_guru_5')->nullable();
            $table->text('wawancara_guru_6')->nullable();
            $table->text('wawancara_guru_7')->nullable();
            $table->text('wawancara_guru_8')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stem_diseminasi_monitoring');
    }
};