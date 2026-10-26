<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // =========================================================
        // bk_answers: tambah kolom 'skor' bila belum ada
        // =========================================================
        if (!Schema::hasColumn('bk_answers', 'skor')) {
            Schema::table('bk_answers', function (Blueprint $table) {
                $table->unsignedTinyInteger('skor')->nullable()->after('jawaban');
            });
        }

        // =========================================================
        // bk_submissions: tambah kolom skor bila belum ada
        // =========================================================
        if (!Schema::hasColumn('bk_submissions', 'total_skor')) {
            Schema::table('bk_submissions', function (Blueprint $table) {
                $table->unsignedSmallInteger('total_skor')->nullable()->after('jumlah_tidak');
            });
        }

        if (!Schema::hasColumn('bk_submissions', 'skor_maksimal')) {
            Schema::table('bk_submissions', function (Blueprint $table) {
                $table->unsignedSmallInteger('skor_maksimal')->nullable()->after('total_skor');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('bk_answers', 'skor')) {
            Schema::table('bk_answers', function (Blueprint $table) {
                $table->dropColumn('skor');
            });
        }

        if (Schema::hasColumn('bk_submissions', 'skor_maksimal')) {
            Schema::table('bk_submissions', function (Blueprint $table) {
                $table->dropColumn('skor_maksimal');
            });
        }

        if (Schema::hasColumn('bk_submissions', 'total_skor')) {
            Schema::table('bk_submissions', function (Blueprint $table) {
                $table->dropColumn('total_skor');
            });
        }
    }
};