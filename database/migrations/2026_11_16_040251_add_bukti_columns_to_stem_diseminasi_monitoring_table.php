<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stem_diseminasi_monitoring', function (Blueprint $table) {
            $table->text('bukti_persiapan_pelaksanaan')->nullable()->after('aspek_persiapan_pelaksanaan');
            $table->text('bukti_elaborasi_konsep')->nullable()->after('aspek_elaborasi_konsep');
            $table->text('bukti_refleksi_evaluasi')->nullable()->after('aspek_refleksi_evaluasi');
            $table->text('bukti_ruang_karya')->nullable()->after('aspek_ruang_karya');
            $table->text('bukti_keterlaksanaan')->nullable()->after('aspek_keterlaksanaan');
            $table->text('bukti_kelengkapan_bukti')->nullable()->after('aspek_kelengkapan_bukti');
            $table->text('bukti_desain_aktivitas')->nullable()->after('aspek_desain_aktivitas');
            $table->text('bukti_implementasi_stem')->nullable()->after('aspek_implementasi_stem');
            $table->text('bukti_tindak_lanjut')->nullable()->after('aspek_tindak_lanjut');
            $table->text('bukti_dampak_awal')->nullable()->after('aspek_dampak_awal');
        });
    }

    public function down(): void
    {
        Schema::table('stem_diseminasi_monitoring', function (Blueprint $table) {
            $table->dropColumn([
                'bukti_persiapan_pelaksanaan',
                'bukti_elaborasi_konsep',
                'bukti_refleksi_evaluasi',
                'bukti_ruang_karya',
                'bukti_keterlaksanaan',
                'bukti_kelengkapan_bukti',
                'bukti_desain_aktivitas',
                'bukti_implementasi_stem',
                'bukti_tindak_lanjut',
                'bukti_dampak_awal',
            ]);
        });
    }
};