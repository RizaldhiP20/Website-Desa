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
        Schema::connection('pgsql_rejosari')->create('surat_permohonans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained('penduduk')->onDelete('cascade');
            $table->foreignId('surat_jenis_id')->constrained('surat_jenis')->onDelete('restrict');
            $table->string('nomor_permohonan')->unique();
            $table->string('status')->default('diajukan'); // diajukan, diproses, selesai, ditolak
            $table->text('keterangan_permohonan')->nullable();
            $table->text('alasan_penolakan')->nullable(); // jika status = ditolak
            $table->string('file_pendukung')->nullable(); // path file pendukung (jika ada)
            $table->timestamp('tanggal_permohonan')->useCurrent();
            $table->timestamp('tanggal_diproses')->nullable();
            $table->timestamp('tanggal_selesai')->nullable();
            $table->unsignedBigInteger('petugas_id')->nullable(); // user petugas yang memproses
            $table->text('catatan_internal')->nullable(); // catatan dari petugas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_rejosari')->dropIfExists('surat_permohonans');
    }
};
