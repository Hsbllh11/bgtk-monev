<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stem_fasda_dampak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sekolah_id')->nullable()->constrained('sekolahs')->nullOnDelete();
            
            // Identitas
            $table->string('nama_sekolah');
            $table->string('nama_pendidik');
            $table->string('mata_pelajaran')->nullable();
            $table->date('tanggal_observasi');
            $table->string('nama_petugas_monev');
            
            // Bagian 1: Telaah Dokumen (Skor 1-4)
            $table->unsignedTinyInteger('skor_konteks_masalah');
            $table->text('bukti_konteks_masalah')->nullable();
            
            $table->unsignedTinyInteger('skor_skenario_lkpd');
            $table->text('bukti_skenario_lkpd')->nullable();
            
            $table->unsignedTinyInteger('skor_integrasi_disiplin');
            $table->text('bukti_integrasi_disiplin')->nullable();
            
            $table->unsignedTinyInteger('skor_instrumen_asesmen');
            $table->text('bukti_instrumen_asesmen')->nullable();

            // Bagian 2: Observasi Kelas (Skor 1-4)
            $table->unsignedTinyInteger('skor_prinsip_5m');
            $table->text('bukti_prinsip_5m')->nullable();
            
            $table->unsignedTinyInteger('skor_aksi_eksperimen');
            $table->text('bukti_aksi_eksperimen')->nullable();
            
            $table->unsignedTinyInteger('skor_dinamika_kolaborasi');
            $table->text('bukti_dinamika_kolaborasi')->nullable();
            
            $table->unsignedTinyInteger('skor_resiliensi');
            $table->text('bukti_resiliensi')->nullable();
            
            $table->unsignedTinyInteger('skor_fungsionalitas');
            $table->text('bukti_fungsionalitas')->nullable();

            // Bagian 3: Wawancara (Esai)
            $table->text('wawancara_murid_1')->nullable();
            $table->text('wawancara_murid_2')->nullable();
            $table->text('wawancara_murid_3')->nullable();
            $table->text('wawancara_murid_4')->nullable();
            
            $table->text('wawancara_pendidik_1')->nullable();
            $table->text('wawancara_pendidik_2')->nullable();
            $table->text('wawancara_pendidik_3')->nullable();
            $table->text('wawancara_pendidik_4')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stem_fasda_dampak');
    }
};