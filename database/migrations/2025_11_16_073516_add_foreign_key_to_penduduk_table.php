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
        Schema::connection('pgsql_rejosari')->table('penduduk', function (Blueprint $table) {
            $table->foreign('kartu_keluarga_id')->references('id')->on('kartu_keluarga')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('pgsql_rejosari')->table('penduduk', function (Blueprint $table) {
            $table->dropForeign(['kartu_keluarga_id']);
        });
    }
};
