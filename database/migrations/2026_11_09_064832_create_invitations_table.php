<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->uuid('token')->unique(); // Link unik
            $table->string('jenis_instrumen'); // 'Evaluasi Dampak' atau 'Reaction'
            $table->foreignId('sekolah_id')->nullable()->constrained('sekolahs')->nullOnDelete();
            $table->string('nama_responden')->nullable(); // Target responden (opsional)
            $table->dateTime('expires_at'); // Kapan link kadaluarsa
            $table->boolean('is_used')->default(false); // Apakah sudah dipakai
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};