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
        Schema::connection('pgsql_rejosari')->create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dusun_id')->nullable();
            $table->unsignedBigInteger('kartu_keluarga_id')->nullable();
            $table->string('nama_lengkap');
            $table->string('nik')->unique();
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('pendidikan_terakhir');
            $table->string('status_dalam_kk');
            $table->string('status_perkawinan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_rejosari')->dropIfExists('penduduk');
    }
};
