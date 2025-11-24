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
        Schema::connection('pgsql_rejosari')->create('peristiwa_kematian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained('penduduk')->onDelete('cascade');
            $table->date('tanggal_kematian');
            $table->time('jam_kematian')->nullable();
            $table->string('tempat_kematian');
            $table->string('penyebab_kematian')->nullable();
            $table->string('nomor_akte_kematian')->nullable()->unique();
            $table->string('pelapor'); // nama orang yang melaporkan
            $table->string('hubungan_pelapor'); // contoh: keluarga, tetangga, dll
            $table->text('catatan')->nullable();
            $table->string('status')->default('tercatat'); // tercatat, verified, archived
            $table->timestamp('tanggal_pencatatan')->nullable();
            $table->unsignedBigInteger('petugas_id')->nullable(); // user yang mencatat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_rejosari')->dropIfExists('peristiwa_kematian');
    }
};
