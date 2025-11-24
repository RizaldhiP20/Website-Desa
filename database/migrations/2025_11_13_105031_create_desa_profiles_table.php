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
        Schema::connection('pgsql_rejosari')->create('desa_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('kepala_desa')->nullable();
            $table->string('sekretaris_desa')->nullable();
            $table->string('alamat')->nullable();
            $table->text('sejarah_desa')->nullable();
            $table->text('visi_misi')->nullable();
            $table->string('foto_kepala_desa')->nullable();
            $table->string('foto_desa')->nullable();
            $table->integer('jumlah_dusun')->default(0);
            $table->integer('jumlah_kk')->default(0);
            $table->integer('jumlah_jiwa')->default(0);
            $table->integer('jumlah_laki_laki')->default(0);
            $table->integer('jumlah_perempuan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_rejosari')->dropIfExists('desa_profiles');
    }
};
