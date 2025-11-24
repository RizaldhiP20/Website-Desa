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
        Schema::connection('pgsql_rejosari')->create('peristiwa_kelahiran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained('penduduk')->onDelete('cascade');
            $table->string('nama_bayi');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->time('jam_lahir')->nullable();
            $table->foreignId('ibu_id')->nullable()->constrained('penduduk')->onDelete('set null');
            $table->foreignId('ayah_id')->nullable()->constrained('penduduk')->onDelete('set null');
            $table->string('nomor_akte_kelahiran')->nullable()->unique();
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
        Schema::connection('pgsql_rejosari')->dropIfExists('peristiwa_kelahiran');
    }
};
