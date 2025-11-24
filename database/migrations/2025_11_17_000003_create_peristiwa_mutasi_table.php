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
        Schema::connection('pgsql_rejosari')->create('peristiwa_mutasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained('penduduk')->onDelete('cascade');
            $table->string('jenis_mutasi'); // pindah_masuk, pindah_keluar, pindah_dalam_desa
            $table->date('tanggal_mutasi');
            $table->string('asal_dusun')->nullable(); // untuk pindah masuk
            $table->string('asal_desa')->nullable(); // untuk pindah masuk dari luar desa
            $table->string('asal_kecamatan')->nullable();
            $table->string('asal_kabupaten')->nullable();
            $table->foreignId('dusun_tujuan_id')->nullable()->constrained('dusuns')->onDelete('set null'); // untuk pindah
            $table->string('alasan_mutasi')->nullable(); // pekerjaan, keluarga, dll
            $table->string('nomor_surat_keterangan')->nullable();
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
        Schema::connection('pgsql_rejosari')->dropIfExists('peristiwa_mutasi');
    }
};
