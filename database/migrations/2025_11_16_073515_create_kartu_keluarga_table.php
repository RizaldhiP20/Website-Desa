<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('pgsql_rejosari')->create('kartu_keluarga', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kk')->unique();
            $table->foreignId('rumah_id')->constrained('rumahs')->onDelete('restrict');
            $table->foreignId('kepala_keluarga_id')->nullable()->constrained('penduduk')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_rejosari')->dropIfExists('kartu_keluarga');
    }
};
