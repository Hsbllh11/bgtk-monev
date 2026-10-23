<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('wawancaras', function (Blueprint $table) {
            foreach ([6, 7, 8] as $n) {
                if (! Schema::hasColumn('wawancaras', "jawaban_{$n}")) {
                    $table->longText("jawaban_{$n}")->nullable();
                }
            }
        });
    }

    public function down(): void
    {
        Schema::table('wawancaras', function (Blueprint $table) {
            $table->dropColumn(['jawaban_6', 'jawaban_7', 'jawaban_8']);
        });
    }
};