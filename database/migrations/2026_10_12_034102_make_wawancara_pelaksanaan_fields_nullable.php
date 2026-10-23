<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wawancaras', function (Blueprint $table) {
            $table->unsignedBigInteger('instrumen_id')->nullable()->change();
            $table->unsignedBigInteger('sekolah_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        // Sengaja tidak mengubah kolom kembali menjadi NOT NULL
        // agar data yang memiliki nilai NULL tetap aman.
    }
};