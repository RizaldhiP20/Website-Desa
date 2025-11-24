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
        Schema::connection('pgsql_rejosari')->create('dusuns', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dusun');
            $table->string('kepala_dusun')->nullable();
            $table->integer('jumlah_asoma')->default(0);
            $table->integer('jumlah_kk')->default(0);
            $table->integer('jumlah_jiwa')->default(0);
            $table->integer('jumlah_laki_laki')->default(0);
            $table->integer('jumlah_perempuan')->default(0);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_rejosari')->dropIfExists('dusuns');
    }
};
